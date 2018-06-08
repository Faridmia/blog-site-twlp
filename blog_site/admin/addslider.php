<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Slider</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $slidertitle   = mysqli_real_escape_string($db->link, $_POST['slider_title']);
                $sliderlink  = mysqli_real_escape_string($db->link, $_POST['slider_link']);
                if(isset($_FILES['slider_image']['name'])){
                            $file_name = $_FILES['slider_image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['slider_image']['tmp_name'];
                            $size = $_FILES['slider_image']['size'];
                            $type = $_FILES['slider_image']['type'];

                        }
                    else{
                        $file_name = '';
                    }
                    $errors = array();
                    if(isset($slidertitle,$sliderlink,$file_name)){
                        if(empty($slidertitle) && empty($sliderlink) && empty($file_name)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($slidertitle)){
                                $errors[] = "slidertitle field are required<br/>";
                            }
                            if(empty($sliderlink)){
                                $errors[] = "sliderlink field are required<br/>";
                            }
                            if(empty($file_name)){
                                $errors[] = "upload field are required<br/>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['slider_image']['name']) && !empty($_FILES['slider_image']['name']) )) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                            }
                 
                            move_uploaded_file($tmp_name, 'upload/slider/'.$newFile);
                            $query = "INSERT INTO tbl_slider(slider_title,slider_link,slider_image) 
                            VALUES('$slidertitle','$sliderlink','$newFile')";
                            $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                              echo "<span class='success'>Slider Inserted Successfully.
                             </span>";
                           } else {
                              echo "<span class='error'>Slider Not Inserted !</span>";
                           }

                        
                    }
                }

                    
            }
        
    ?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Slider Title</label>
                            </td>
                            <td>
                                <input type="text" name="slider_title" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Slider Image</label>
                            </td>
                            <td>
                                <input type="file" name="slider_image" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Slider Link</label>
                            </td>
                            <td>
                                <input type="text" name="slider_link"  class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="AddSlider" />
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

