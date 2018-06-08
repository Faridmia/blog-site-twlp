<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
<?php
    if(!isset($_GET['sliderid']) || $_GET['sliderid'] == null){
        echo "<script>window.location = 'sliderlist.php';</script>";
        
    }
    else
    {
        $sliderid = $_GET['sliderid'];
    }
    

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update slider</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $slider_title   = mysqli_real_escape_string($db->link, $_POST['title']);
                $slider_link    = mysqli_real_escape_string($db->link, $_POST['link']);
                  if(isset($_FILES['image']['name'])){
                            $file_name = $_FILES['image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $size = $_FILES['image']['size'];
                            $type = $_FILES['image']['type'];

                    }
                    else{
                        $file_name = '';
                    }
                     $errors = array();
                     if(isset($slider_title,$slider_link,$file_name)){
                        if(empty($slider_title) && empty($slider_link) && empty($file_name)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($slider_title)){
                                $errors[] = "slider_title field are required";
                            }
                            if(empty($slider_link)){
                                $errors[] = "slider_link field are required";
                            }
                            if(empty($file_name)){
                                $errors[] = "upload field are required";
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
                              move_uploaded_file($tmp_name, 'upload/slider/'.$newFile);
                                $query1 = "UPDATE tbl_slider SET 
                                        slider_title = '$slider_title',
                                        slider_link = '$slider_link',
                                        slider_image = '$newFile'
                                        WHERE slider_id='$sliderid'";
                                $updated_row = $db->update($query1);
                                if ($updated_row) {
                                  echo "<span class='success'>slider updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>Slider Not updated !</span>";
                               }
                            }
                
                            

                        }
                 }

                    
            }
        
    ?>
                <div class="block"> 
            <?php
                $query23 = "SELECT * FROM tbl_slider WHERE slider_id='$sliderid' ORDER BY slider_id DESC";
                $sliderselect = $db->select($query23);
               foreach($sliderselect as $key => $postvalue){

            ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Slider Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postvalue['slider_title'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Slider Image</label>
                            </td>
                            <td>
                                <img src="<?php echo 'upload/slider/'.$postvalue['slider_image'];?>" width='60px' height='40px'><br/>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Slider Link</label>
                            </td>
                            <td>
                                <input type="text" name="link" value="<?php echo $postvalue['slider_link'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="UpdateSlider"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }  ?>
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

