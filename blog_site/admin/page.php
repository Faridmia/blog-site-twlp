<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if(!isset($_GET['pageid']) || $_GET['pageid'] == null){
        echo "<script>window.location = 'index.php';</script>";
        
    }
    else
    {
        $pageid = $_GET['pageid'];
    }

?>
<style type="text/css">
    .actiondel{margin:left;}
    .actiondel a {
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 2px 10px;
    font-weight: normal;
    background: #F0F0F0;
}
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>update Page</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $p_name   = mysqli_real_escape_string($db->link, $_POST['p_name']);
                $p_body  = mysqli_real_escape_string($db->link, $_POST['p_body']);
                
                    $errors = array();
                    if(isset($p_name,$p_body)){
                        if(empty($p_name) && empty($p_body)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($p_name)){
                                $errors[] = "name field are required";
                            }
                            if(empty($p_body)){
                                $errors[] = "body field are required";
                            }
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            
                            $pupdatequery = "UPDATE tbl_page SET p_name= '$p_name',p_body='$p_body' WHERE p_id='$pageid'";
                         $updaterow = $db->update($pupdatequery);
                            if ($updaterow) {
                              echo "<span class='success'>page updated Successfully.
                             </span>";
                           } else {
                              echo "<span class='error'>page Not updated !</span>";
                           }

                        
                    }
                }

                    
            }
        
    ?>
                <div class="block">
        <?php
                $pquery = "SELECT * FROM tbl_page WHERE p_id='$pageid'";
                $pagedetails = $db->select($pquery);
                if($pagedetails){
                    while ($result = $pagedetails->fetch_assoc()){
                    
        ?>                 
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="p_name"  value="<?php echo $result['p_name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="p_body" ><?php echo $result['p_body'];?>"</textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="update" />
                                <span class="actiondel"><a return confirm('') href="deletepage.php?delpage=<?php echo $result['p_id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php }} ?>
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

