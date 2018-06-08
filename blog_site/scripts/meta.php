<?php
		if(isset($_GET['pageid'])){
			$pagetitleid = $_GET['pageid'];
			$query = "SELECT * FROM tbl_page WHERE p_id='$pagetitleid'";
            $pagetitle = $db->select($query);
            if($pagetitle){
                while ($resulttitle = $pagetitle->fetch_assoc()){ ?>
                <title><?php echo $resulttitle['p_name']; ?>-<?php echo TITLE; ?></title>
            <?php } }  } elseif (isset($_GET['id'])){
				$posttitleid = $_GET['id'];
				$queryp = "SELECT * FROM tbl_post WHERE id='$posttitleid'";
	            $posttitle = $db->select($queryp);
            if($posttitle){
                while ($resulttitlep = $posttitle->fetch_assoc()){ ?>
                <title><?php echo $resulttitlep['title']; ?>-<?php echo TITLE; ?></title>
            <?php } }  } else {?>
            	<title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
            <?php } ?>
		

	
	<meta name="language" content="English">
<?php 
	    if(isset($_GET['id'])){
		$keydesid    = $_GET['id'];
		$keydesquery = "SELECT * FROM tbl_post WHERE id='$keydesid'";
	    $keydesselect    = $db->select($keydesquery);
	    if($keydesselect){
          while ($resultd = $keydesselect->fetch_assoc()){ ?>
          	<meta name="description" content="<?php echo $resultd['metades'];?>">
    <?php }}} else{ ?>
    		<meta name="description" content="<?php echo METADESCRIPTION; ?>">
   <?php } ?>

	
<?php
	if (isset($_GET['id'])){
		$keywordid    = $_GET['id'];
		$keywordquery = "SELECT * FROM tbl_post WHERE id='$keywordid'";
	    $keyselect    = $db->select($keywordquery);
	    if($keyselect){
          while ($resultk = $keyselect->fetch_assoc()){ ?>
            <meta name="keywords" content="<?php echo $resultk['tags'];?>">
        <?php } } } else {?>
           <meta name="keywords" content="<?php echo KEYWORDS;?>">
        <?php } ?>
        <meta name="author" content="farid">