<?php include 'inc/header.php' ?>
<?php
                $pquery = "SELECT * FROM tbl_page WHERE p_id='$pageid'";
                $pagedetails = $db->select($pquery);
                if($pagedetails){
                    while ($result = $pagedetails->fetch_assoc()){
					
                    
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<div class="notfound">
    				<p><span>404</span> Not Found</p>
    			</div>
	        </div>
		</div>
		<?php include 'inc/sidebar.php' ?>
		<?php include 'inc/footer.php' ?>
	