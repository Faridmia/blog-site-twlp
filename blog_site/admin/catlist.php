<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
        <?php
        	
        	if(isset($_GET['delid'])){
        		$delid = $_GET['delid'];
        		$query = "DELETE FROM tbl_category WHERE cat_id='$delid'";
        		$delcat = $db->delete($query);
        		if($delcat){
                        echo "<span class='success'>category Deleted successfully....</span>";
                    }else{
                        echo "<span class='error'>Category Not deleted....</span>";
                }
        	}
        ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$query = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
				$category = $db->select($query);
				if($category){
					$i = 0;
					while ($result = $category->fetch_assoc()) {
						$i++;
					
				
				
			?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['cat_name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $result['cat_id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to Delete data')"; href="?delid=<?php echo $result['cat_id']; ?>">Delete</td>
						</tr>
				<?php } } ?>
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

