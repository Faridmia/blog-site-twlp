<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Theme</h2>
               <div class="block copyblock"> 

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $theme = mysqli_real_escape_string($db->link,$_POST['theme']);
               
                    $query = "UPDATE tbl_theme SET theme= '$theme' WHERE t_id='1'";
                    $updatetheme = $db->update($query);
                    if($updatetheme){
                        echo "<span class='success'>Theme updated successfully....</span>";
                    }else{
                        echo "<span class='error'>Theme Not updated....</span>";
                    }
            }
        ?>

        <?php
            $selectquery = "SELECT * FROM tbl_theme WHERE t_id='1'";
            $themes = $db->select($selectquery);
            while($result = $themes->fetch_assoc()){
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="radio" <?php if($result['theme'] == 'default'){echo 'checked';}?> name="theme"  value="default" />Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" <?php if($result['theme'] == 'green'){echo 'checked';}?> name="theme"  value="green" />Green
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" <?php if($result['theme'] == 'red'){echo 'checked';}?> name="theme"  value="red" />Red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>