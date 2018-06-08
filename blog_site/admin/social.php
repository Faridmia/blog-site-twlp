<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $facebook   = mysqli_real_escape_string($db->link, $_POST['facebook']);
                $twitter    = mysqli_real_escape_string($db->link, $_POST['twitter']);
                $linkedin   = mysqli_real_escape_string($db->link, $_POST['linkedin']);
                $gplus      = mysqli_real_escape_string($db->link, $_POST['googleplus']);
                
                     $errors = array();
                    if(isset($facebook,$twitter,$linkedin,$gplus)){
                        if(empty($facebook) && empty($twitter) && empty($linkedin) && empty($gplus)){
                            $errors[] = "<span style=color:#000;font-size:24px;>All field are required</span>";
                        }
                        else{
                            if(empty($facebook)){
                                $errors[] = "<span style=color:#000;font-size:24px;>Facebook field are required</span>";
                            }
                            if(empty($twitter)){
                                $errors[] = "<span style=color:#000;font-size:24px;>Twitter field are required</span>";
                            }
                            if(empty($linkedin)){
                                $errors[] = "<span style=color:#000;font-size:24px;>Linkedin field are required</span>";
                            }
                            if(empty($gplus)){
                                $errors[] = "<span style=color:#000;font-size:24px;>Google plus field are required</span>";
                            }
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                                $query1 = "UPDATE tbl_social SET 
                                        facebook    = '$facebook',
                                        twitter   = '$twitter',
                                        linkedin = '$linkedin',
                                         googleplus = '$gplus'
                                        WHERE s_id='1'";
                                $socialupdate = $db->update($query1);
                                if ($socialupdate) {
                                  echo "<span style=color:#000;font-size:24px;>Social media updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>social Not updated !</span>";
                               }
                            }
                            

                    
                }

        }
        
    ?>
                <div class="block">
            <?php
                $query = "SELECT * FROM tbl_social WHERE s_id='1'";
                $socialselct = $db->select($query);
                if($socialselct){
                    while ($row = $socialselct->fetch_assoc()) {
                    
            ?>                
                 <form action="social.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $row['facebook']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $row['twitter']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" value="<?php echo $row['linkedin']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" value="<?php echo $row['googleplus']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>
