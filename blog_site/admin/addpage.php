<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
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
                            
                            $query = "INSERT INTO tbl_page(p_name,p_body) 
                            VALUES('$p_name','$p_body')";
                            $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                              echo "<span class='success'>page Created Successfully.
                             </span>";
                           } else {
                              echo "<span class='error'>page Not created !</span>";
                           }

                        
                    }
                }

                    
            }
        
    ?>
                <div class="block">               
                 <form action="addpage.php" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="p_name"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="p_body"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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

