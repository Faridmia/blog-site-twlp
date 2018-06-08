<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    $userid   = Session::get('userId');
    $userRole = Session::get('UserRole'); 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Profile</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $name        = mysqli_real_escape_string($db->link, $_POST['name']);
                $username    = mysqli_real_escape_string($db->link, $_POST['username']);
                $email       = mysqli_real_escape_string($db->link, $_POST['email']);
                $details     = mysqli_real_escape_string($db->link, $_POST['details']);
                
                  
                    $errors = array();
                    if(isset($name,$username,$email,$details)){
                        if(empty($name) && empty($username) && empty($email) && empty($details)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($name)){
                                $errors[] = "Name field are required";
                            }
                            if(empty($username)){
                                $errors[] = "Username field are required";
                            }
                            if(empty($email)){
                                $errors[] = "email field are required";
                            }
                            if(empty($details)){
                                $errors[] = "details field are required";
                            }
                            
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                           
                                $query1 = "UPDATE tbl_user SET 
                                        name = '$name',
                                        username = '$username',
                                        user_email = '$email',
                                        details = '$details'
                                        WHERE user_id='$userid'";
                                $updated_row = $db->update($query1);
                                if ($updated_row) {
                                  echo "<span class='success'>User Data updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>Data Not updated !</span>";
                               }
                        }
                 }
    
            }
        
    ?>
                <div class="block"> 
            <?php
                $query = "SELECT * FROM tbl_user WHERE user_id='$userid' AND userrole='$userRole' ORDER BY user_id DESC";
                $getuser = $db->select($query);
              if($getuser){
               foreach($getuser as $key => $postvalue){

            ?>              
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $postvalue['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" readonly name="username" value="<?php echo $postvalue['username'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>E-mail</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $postvalue['user_email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details" >
                                    <?php echo $postvalue['details'];?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }  }?>
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

