<?php
    include '../lib/session.php';
    Session::sessioncheck();
?>
<?php include '../config/config.php' ?>
<?php include '../lib/Database.php' ?>
<?php include '../helpers/format.php' ?>
<?php
    $db = new Database();
    
?>

<?php
    if(!isset($_GET['delpostid']) || $_GET['delpostid'] == null){
        echo "<script>window.location = 'postlist.php';</script>";
        
    }
    else
    {
        $delid = $_GET['delpostid'];

        $query = "SELECT * FROM tbl_post WHERE id='$delid'";
        $delgetdata = $db->select($query);
        if($delgetdata){
		        while ($delimg = $delgetdata->fetch_assoc()) {
		        	$dellinkimg = $delimg['image'];
		        	unlink('upload/'.$dellinkimg);
		        }
		}

		$delquery = "DELETE FROM tbl_post WHERE id='$delid'";
		$dels = $db->delete($delquery);
		if($dels){
			echo "<script>alert('Data deleted successfully');</script>";
			echo "<script>window.location = 'postlist.php';</script>";
		}
		else{
			echo "<script>alert('Data not deleted');</script>";
			echo "<script>window.location = 'postlist.php';</script>";

		}
    }
    

?>