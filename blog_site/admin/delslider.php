<?php
    include '../lib/session.php';
    Session::sessioncheck();
?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
<?php include '../config/config.php' ?>
<?php include '../lib/Database.php' ?>
<?php include '../helpers/format.php' ?>
<?php
    $db = new Database();
    
?>

<?php
    if(!isset($_GET['sliderid']) || $_GET['sliderid'] == null){
        echo "<script>window.location = 'sliderlist.php';</script>";
        
    }
    else
    {
        $delid = $_GET['sliderid'];

        $query = "SELECT * FROM tbl_slider WHERE slider_id='$delid'";
        $delgetdata = $db->select($query);
        if($delgetdata){
                while ($delimg = $delgetdata->fetch_assoc()) {
                    $dellinkimg = $delimg['slider_image'];
                    unlink('upload/slider/'.$dellinkimg);
                }
        }

        $delquery = "DELETE FROM tbl_slider WHERE slider_id='$delid'";
        $dels = $db->delete($delquery);
        if($dels){
            echo "<script>alert('Data deleted successfully');</script>";
            echo "<script>window.location = 'sliderlist.php';</script>";
        }
        else{
            echo "<script>alert('Data not deleted');</script>";
            echo "<script>window.location = 'sliderlist.php';</script>";

        }
    }
    

?>