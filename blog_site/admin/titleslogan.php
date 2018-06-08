<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
    <style>
        .leftside{
            float:left;
            width:70%;
        }
        .rightside{float:left;width:20%;}
        .rightside img{width:60px;height:70px;}
    </style>
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title = $fm->validation($_POST['title']);
                $slogan = $fm->validation($_POST['slogan']);
              
                $title   = mysqli_real_escape_string($db->link,$title);
                $slogan  = mysqli_real_escape_string($db->link,$slogan);
                
                  if(isset($_FILES['logo']['name'])){
                            $file_name = $_FILES['logo']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['logo']['tmp_name'];
                            $size = $_FILES['logo']['size'];
                            $type = $_FILES['logo']['type'];

                    }
                    else{
                        $file_name = '';
                    }
                     $errors = array();
                    if(isset($title,$slogan)){
                        if(empty($title) && empty($slogan)){
                            $errors[] = "<span style=color:white;font-size:24px;>All field are required</span>";
                        }
                        else{
                            if(empty($title)){
                                $errors[] = "<span style=color:white;font-size:24px;>Title field are required</span>";
                            }
                            if(empty($slogan)){
                                $errors[] = "<span style=color:white;font-size:24px;>slogan field are required</span>";
                            }
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                           if(!empty($file_name)){
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                              move_uploaded_file($tmp_name, 'upload/logo/'.$newFile);
                                $query1 = "UPDATE logo SET 
                                        title    = '$title',
                                        slogan   = '$slogan',
                                        logo_img = '$newFile'
                                        WHERE logo_id='1'";
                                $updated_row = $db->update($query1);
                                if ($updated_row) {
                                  echo "<span style=color:white;font-size:24px;>Logo updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>Logo Not updated !</span>";
                               }
                            }
                            else{
                                     $query1 = "UPDATE logo SET 
                                        title    = '$title',
                                        slogan   = '$slogan'
                                        WHERE logo_id='1'";
                                $updated_row = $db->update($query1);
                                if ($updated_row) {
                                  echo "<span style=color:white;font-size:24px;>Logo updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>Logo Not updated !</span>";
                               }
                            }

                       }
                }

        }
        
    ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
<?php
                $query = "SELECT * FROM logo WHERE logo_id='1'";
                $logoblog = $db->select($query);
                if($logoblog){
                    while ($logoimg = $logoblog->fetch_assoc()) {
                    
?> 
                <div class="block sloginblock">
            
            <div class="leftside">              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $logoimg['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $logoimg['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="rightside">
                        <img src="<?php echo 'upload/logo/'.$logoimg['logo_img'];?>" width='100px' height='120'>
                        
                </div>
        </div>
    <?php } } ?>
            </div>
        </div>
<?php include 'inc/footer.php' ?>
