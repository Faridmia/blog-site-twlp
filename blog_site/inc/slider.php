<div class="slidersection templete clear">
	<div id="slider">
	<?php
					$query = "SELECT * FROM tbl_slider ORDER BY slider_id LIMIT 5";
					$slider = $db->select($query);
					if($slider){
					while($result = $slider->fetch_assoc()){ 
							
	?>
        
            <a href="<?php echo $result['slider_link'];?>"><img src="admin/upload/slider/<?php echo $result['slider_image'];?>" alt="<?php echo $result['slider_title'];?>" title="<?php echo $result['slider_title'];?>" /></a>
     <?php }} ?>
            
        </div>

</div>