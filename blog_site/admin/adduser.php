<?php include 'inc/header.php' ?>
<style>
    .success{
        font-size: 24px;
        color:green;
    }
    .error{
        font-size: 24px;
        color:red;
    }
</style>
<?php include 'inc/sidebar.php' ?>
<?php
    if(!Session::get('UserRole') == '0'){ 
         echo "<script>window.location = 'index.php';</script>";
    }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $fm->validation($_POST['username']);
                $password = $fm->validation($_POST['password']);
                $password = $fm->validation(md5($_POST['password']));
                $user_email = $fm->validation($_POST['user_email']);
                $role     = (int) $_POST['user_role'];
                $username = mysqli_real_escape_string($db->link,$username);
                $user_email = mysqli_real_escape_string($db->link,$user_email);
                
                $errors = array();
                if(isset($username,$password,$role,$user_email)){
                        if(empty($username) && empty($password) && empty($role) && empty($user_email)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
               else{
                    $mailquery = "SELECT * FROM tbl_user WHERE user_email='$user_email' limit 1";
                    $mailcheck = $db->select($mailquery);
                    if ($mailcheck != false) {
                        $errors[] = "Email already exits..!<br/>";
                    }
                    if(empty($username)){
                        $errors[] = "username field are required<br/>";
                    }
                    if(empty($password)){
                        $errors[] = "password field are required<br/>";
                    }
                     if(empty($user_email)){
                        $errors[] = "email field are required<br/>";
                    }
                    elseif(!filter_var($user_email,   FILTER_VALIDATE_EMAIL)){
                                $errors[] = "<span class='error'>Invalid email format</span>";
                    }
                     if(empty($role)){
                        $errors[] = "userRole field are required<br/>";
                    }
                }
                if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                }
                else
                {
                    

                    $query1 = "INSERT INTO tbl_user(username,password,userrole,user_email)VALUES('$username','$password','$role','$user_email')";
                    $user = $db->insert($query1);
                    if($user){
                        echo "<span class='success'>create user successfully....</span>";
                    }else{
                        echo "<span class='error'>user Not created....</span>";
                   }
                }
            }
        }
    
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td><label>Username</label></td>
                            <td>
                                <input type="text" name="username" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td>
                                <input type="password" name="password" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>E-mail</label></td>
                            <td>
                                <input type="text" name="user_email" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td><label>User Role</label></td>
                            <td>
                                <select id="select" name="user_role">
                                    <option value="">Assian User Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>
						<tr> <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                                <input type="reset" name="clear" Value="clear" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>