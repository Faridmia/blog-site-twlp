<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == null){
        echo "<script>window.location = 'postlist.php';</script>";
        header("Location:postlist.php");
    }
    else
    {
        $postid = $_GET['viewpostid'];
    }
    

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                echo "<script>window.location = 'postlist.php';</script>";
                    
            }
        
    ?>
                <div class="block"> 
            <?php
                $query = "SELECT * FROM tbl_post WHERE id='$postid' ORDER BY id DESC";
                $row = $db->select($query);
               foreach($row as $key => $postvalue){

            ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $postvalue['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select">
                                    <option value="">--Select category--</option>
                    <?php
                        $query = "SELECT * FROM tbl_category";
                        $category = $db->select($query);
                        if($category){
                            while($result = $category->fetch_assoc()){
                        
                    ?>
                                    <option
                                    <?php
                                        if($postvalue['cat_id'] == $result['cat_id']){ ?>
                                            selected= 'selected';
                                   <?php } ?>
                                     value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                            <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo 'upload/'.$postvalue['image'];?>" width='auto' height='200px'>
                               
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" >
                                    <?php echo $postvalue['body'];?>
                                </textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Description</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $postvalue['metades'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $postvalue['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                 <input type="text" readonly value="<?php echo $postvalue['author'];?>" class="medium" />
                                 
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }  ?>
                </div>
            </div>
        </div>

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
            });
</script>
<?php include 'inc/footer.php' ?>
 <!-- Load TinyMCE -->

