<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
<?php
    if(!isset($_GET['catid']) || $_GET['catid'] == null){
        echo "<script>window.location = 'catlist.php';</script>";
       
    }
    else
    {
        $catid = $_GET['catid'];
    }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Updated Category</h2>
               <div class="block copyblock"> 

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $name = mysqli_real_escape_string($db->link,$name);
                if(empty($name)){
                    echo "<span class='error'>Field must not be empty</span>";
                }
                else
                {
                    $query = "UPDATE tbl_category SET cat_name= '$name' WHERE cat_id='$catid'";
                    $updaterow = $db->update($query);
                    if($updaterow){
                        echo "<span class='success'>category updated successfully....</span>";
                    }else{
                        echo "<span class='error'>Category Not updated....</span>";
                    }
                }
            }
        ?>

        <?php
            $query = "SELECT * FROM tbl_category WHERE cat_id='$catid' ORDER BY cat_id DESC";
            $category = $db->select($query);
            while($result = $category->fetch_assoc()){
        ?>
                 <form action="editcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value=<?php echo $result['cat_name']; ?> class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>