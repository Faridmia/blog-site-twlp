<?php include 'inc/header.php' ?>
<?php
	$pagesid       = mysqli_real_escape_string($db->link,$_GET['pageid']);
    if(!isset($page) || $pagesid == null){
        header("location:404.php");
        
    }
    else
    {
        $pageid = $pagesid;
    }

?>
<?php
                $pquery = "SELECT * FROM tbl_page WHERE p_id='$pageid'";
                $pagedetails = $db->select($pquery);
                if($pagedetails){
                    while ($result = $pagedetails->fetch_assoc()){
                    
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['p_name'];?></h2>
				<?php echo $result['p_body'];?>
	
				
	</div>

</div>
<?php } } else{ header("location:404.php");} ?>
		<?php include 'inc/sidebar.php' ?>
		<?php include 'inc/footer.php' ?>
	