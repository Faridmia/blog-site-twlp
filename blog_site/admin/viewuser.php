<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if(!isset($_GET['uid']) || $_GET['uid'] == null){
        echo "<script>window.location = 'userlist.php';</script>";
        
    }
    else
    {
        $uid = $_GET['uid'];
    }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Details</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                echo "<script>window.location = 'userlist.php';</script>";
    
            }
        
    ?>
                <div class="block"> 
            <?php
                $query = "SELECT * FROM tbl_user WHERE user_id='$uid' ORDER BY user_id DESC";
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
                                <input type="text" readonly value="<?php echo $postvalue['name'];?>" class="medium" />
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
                                <input type="text" readonly value="<?php echo $postvalue['user_email'];?>" class="medium" />
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
                                <input type="submit" name="submit" Value="Ok"/>
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

