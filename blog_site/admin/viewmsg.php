<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
                if(!isset($_GET['msgid']) || $_GET['msgid'] == null){
                    echo "<script>window.location = 'inbox.php';</script>";
                    
                }
                else
                {
                    $viewid = $_GET['msgid'];
                }
                
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
               echo "<script>window.location = 'inbox.php';</script>";
                    
            }
        
    ?>
                <div class="block">               
                 <form action="" method="post">
                    <?php
                            $query = "SELECT * FROM tbl_contact WHERE con_id='$viewid'";
                            $viewmsg = $db->select($query);
                            if($viewmsg){
                                while ($result = $viewmsg->fetch_assoc()) {
                    
                ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['firstname'].' '.$result['lastname']; ?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>E-mail</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $fm->formatDate($result['date']);?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="p_body">
                                    <?php echo $result['message'];?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    <?php } }?>
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

