<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $copy_right = $fm->validation($_POST['copyright']);
                $copy_right   = mysqli_real_escape_string($db->link,$copy_right);
                
                     $errors = array();
                    if(isset($copy_right)){
                            if(empty($copy_right)){
                                $errors[] = "<span style=color:#000;font-size:24px;>copy_right field are required</span>";
                            }
                            
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                                $query1 = "UPDATE copyright SET 
                                        copyright    = '$copy_right'
                                        WHERE c_id='1'";
                                $c_update = $db->update($query1);
                                if ($c_update) {
                                  echo "<span style=color:#000;font-size:24px;>copyright  updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>copyright Not updated !</span>";
                               }
                            }
                            

                    
                }

        }
        
    ?>
                <div class="block copyblock">
             <?php
                $query = "SELECT * FROM copyright WHERE c_id='1'";
                $copyright = $db->select($query);
                if($copyright){
                    while ($row = $copyright->fetch_assoc()) {
                    
            ?>    
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $row['copyright'];?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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