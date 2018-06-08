</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	 <?php
                $query2 = "SELECT * FROM copyright WHERE c_id='1'";
                $copyrightoption = $db->select($query2);
                if($copyrightoption){
                    while ($result = $copyrightoption->fetch_assoc()) {
                    
    ?>  
	  <p>&copy; <?php echo $result['copyright']; ?> <?php echo date("Y");?></p>
	<?php }}?>
	</div>
	<div class="fixedicon clear">
	<?php
                $query = "SELECT * FROM tbl_social WHERE s_id='1'";
                $socialselct = $db->select($query);
                if($socialselct){
                    while ($row = $socialselct->fetch_assoc()) {
                    
    ?>  
		<a href="<?php echo $row['facebook'];?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $row['twitter'];?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $row['linkedin'];?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $row['googleplus'];?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<?php } }?>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>