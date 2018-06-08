<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $oldpassword = $fm->validation(md5($_POST['oldpassword']));
                $newpassword = $fm->validation(md5($_POST['newpassword']));
                
                $oldpassword = mysqli_real_escape_string($db->link,$oldpassword);
                $newpassword = mysqli_real_escape_string($db->link,$newpassword);
                $errors = array();
                    if(isset($oldpassword,$newpassword)){
                        if(empty($oldpassword) && empty($newpassword)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($oldpassword)){
                                $errors[] = "Old password field are required";
                            }
                            if(empty($newpassword)){
                                $errors[] = "New password field are required";
                            }

                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }else{
                
                            $oldpassquery = "SELECT * FROM tbl_user WHERE password='$oldpassword' limit 1";
                            $passcheck = $db->select($oldpassquery);
                            if($passcheck != false){
                                while ($result = $passcheck->fetch_assoc()) {

                                    $userid   = $result['user_id'];
                                }
                                $queryp = "UPDATE tbl_user SET password= '$newpassword' WHERE user_id='$userid'";
                                $updatepass = $db->update($queryp);
                                if($updatepass){
                                   echo "<span style='color:red;font-size:24px;'>Password updated successfully...!</span>";
                                }else{
                                    echo "<span style='color:red;font-size:24px;'>Password  not update.!</span>";
                                }
                            

                            }
                            else
                            {
                                echo "<span style='color:red;font-size:24px;'>Old password doesn't not match....!</span>";
                            }
                        }


                }
                
                
            }
        ?>               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password"  name="oldpassword" class="medium" required="1" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" name="newpassword" class="medium" required="1" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <input type="reset" name="clear" Value="clear" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>