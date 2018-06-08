<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/format.php'; ?>
<?php
	$db = new Database();
	$fm = new Format();

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'scripts/meta.php'; ?>
	
	<?php include 'scripts/css.php'; ?>
	<?php include 'scripts/js.php'; ?>
	
	
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Website Title</h2>
				<p>Our website description</p>
			</div>
		</a>
		<div class="social clear">
	<?php
                $query1 = "SELECT * FROM tbl_social WHERE s_id='1'";
                $socialselct = $db->select($query1);
                if($socialselct){
                    while ($row = $socialselct->fetch_assoc()) {
                    
    ?>  
			<div class="icon clear">
				<a href="<?php echo $row['facebook'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['twitter'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['linkedin'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['googleplus'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
		<?php } }?>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search"/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php
		$path = $_SERVER['SCRIPT_FILENAME'];
	    $currentpage = basename($path,'.php'); 
	?>
	<ul>
		<li><a <?php if($currentpage == 'index'){ echo "id='active'"; }?> href="index.php">Home</a></li>
		 <?php
                $query = "SELECT * FROM tbl_page";
                $page = $db->select($query);
                if($page){
                    while ($result = $page->fetch_assoc()){
                    
        ?>   
                <li><a
                	<?php
                		if(isset($_GET['pageid']) && $_GET['pageid'] == $result['p_id']){
                			echo "id='active'";
                		} 
                	?>
                 href="page.php?pageid=<?php echo $result['p_id'];?>"><?php echo $result['p_name'];?></a> </li>
        <?php } } ?>
		<li><a <?php if($currentpage == 'contact'){ echo "id='active'"; }?> href="contact.php">Contact</a></li>
	</ul>
</div>