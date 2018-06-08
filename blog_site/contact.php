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


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
              	$fname       = $_POST['firstname'];
              	$lname       = $_POST['lastname'];
              	$email       = $_POST['email'];
              	$message       = $_POST['message'];
                $fname       = mysqli_real_escape_string($db->link,$fname);
                $lname       = mysqli_real_escape_string($db->link,$lname);
                $email       = mysqli_real_escape_string($db->link,$email);
                $message     = mysqli_real_escape_string($db->link,$message);

                $errors = array();
                    if(isset($fname,$lname,$email,$message)){
                        if(empty($fname) && empty($lname) && empty($email) && empty($message)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
                        else{
                            if(empty($fname)){
                                $errors[] = "<span class='error'>firstname field are required</span>";
                            }
                            if(empty($lname)){
                                $errors[] = "<span class='error'>lastname field are required</span>";
                            }
                            if(empty($email)){
                                $errors[] = "<span class='error'>E-mail field are required</span>";
                            }
                            elseif(!filter_var($email,	FILTER_VALIDATE_EMAIL)){
                            	$errors[] = "<span class='error'>Invalid email format</span>";
                            }
                            if(empty($message)){
                                $errors[] = "<span class='error'>message field are required..!</span>";
                            }
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            
                            $insertquery = "INSERT INTO tbl_contact(firstname,lastname,email,message)VALUES('$fname','$lname','$email','$message')";
                         $insertrow = $db->insert($insertquery);
                            if ($insertrow) {
                              echo "<span class='success'>Data created Successfully.
                             </span>";
                           } else {
                              echo "<span class='error'>Data Not inserted !</span>";
                           }

                        
                    }
                }

                    
            }
    

?>

			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

</div>
		<?php include 'inc/sidebar.php' ?>
		<?php include 'inc/footer.php' ?>