<?php
	include '../lib/session.php';
	Session::checklogin();
?>

<?php include '../config/config.php' ?>
<?php include '../lib/Database.php' ?>
<?php include '../helpers/format.php' ?>
<?php
	$db = new Database();
	$fm = new Format();

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user_email = $fm->validation($_POST['user_email']);
				
				$user_email = mysqli_real_escape_string($db->link,$user_email);
				if(!filter_var($user_email,	FILTER_VALIDATE_EMAIL)){
                            	echo "Invalid email format";
                }else{
                	$mailquery = "SELECT * FROM tbl_user WHERE user_email='$user_email' limit 1";
                    $mailcheck = $db->select($mailquery);
					if($mailcheck != false){
						while ($result = $mailcheck->fetch_assoc()) {

							$userid   = $result['user_id'];
							$username = $result['username'];
						}
						$text = substr($user_email, 0,3);
						$rand = rand(156999,50000);
						$newpassword = "$text$rand";
						$password = md5($newpassword);
						$queryp = "UPDATE tbl_user SET password= '$password' WHERE user_id='$userid'";
	                    $updatepass = $db->update($queryp);
	                    $to = "$user_email";
	                    $form = "mdfarid7830@gmail.com";
	                    $header = "From: $form\n";
	    $header .= "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html;charset=UTF-8" . "\r\n";
	    				$subject = "Your password";
	    				$message = "Your username is ".$username." and your password is ".$newpassword." please visit website to login.";
	    				$sendmail = mail($to, $subject, $message,$header); 

	                    if($sendmail){
	                       echo "<span style='color:red;font-size:24px;'>Please check your email a new password.!</span>";
	                    }else{
	                        echo "<span style='color:red;font-size:24px;'>Email not send.!</span>";
	                    }
							

					}
					else
					{
						echo "<span style='color:red;font-size:24px;'>Email not Exits....!</span>";
					}


                }
				
				
			}
		?>
		<form action="" method="post">
			<h1>Recovery Password</h1>
			<div>
				<input type="text" placeholder="Please enter your valid email" required="" name="user_email"/>
			</div>
			<div>
			
				<input type="submit" value="send mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">login</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>