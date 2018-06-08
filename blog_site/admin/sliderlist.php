<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="30%">Slider Title</th>
							<th width="30%">Slider Link</th>
							<th width="20%">Slider Image</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$query = "SELECT * FROM tbl_slider";
					$slider = $db->select($query);
					$i = 0;
					foreach($slider as $key => $result){
						$i++;
							
				?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['slider_title']; ?></td>
							<td class="center"> <?php echo $result['slider_link']; ?></td>
							<td><img src="<?php echo 'upload/slider/'.$result['slider_image'];?>" width='100px' height='auto'></td>;
							<td>
						<?php
							if(Session::get('UserRole') == '0') {?>
							<a href="editslider.php?sliderid=<?php echo $result['slider_id'] ?>">Edit</a> ||
							 <a onclick="return confirm('Are you sure want to delete data..!')"; href="delslider.php?sliderid=<?php echo $result['slider_id'] ?>">Delete</a>
							

						<?php } ?>
								
							</td>
						</tr>
						<?php }  ?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
 <?php include 'inc/footer.php' ?>
