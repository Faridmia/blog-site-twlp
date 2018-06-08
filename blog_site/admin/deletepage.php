<?php
    include '../lib/session.php';
    Session::sessioncheck();
?>
<?php include '../config/config.php' ?>
<?php include '../lib/Database.php' ?>
<?php
    $db = new Database();
    
?>

<?php
    if(!isset($_GET['delpage']) || $_GET['delpage'] == null){
        echo "<script>window.location = 'index.php';</script>";
        
    }
    else
    {
        $delpid = $_GET['delpage'];

        
	}

		$delquery = "DELETE FROM tbl_page WHERE p_id='$delpid'";
		$delpage = $db->delete($delquery);
		if($delpage){
			echo "<script>alert('Data deleted successfully');</script>";
			echo "<script>window.location = 'index.php';</script>";
		}
		else{
			echo "<script>alert('Data not deleted');</script>";
			echo "<script>window.location = 'index.php';</script>";

		}
    
    

?>