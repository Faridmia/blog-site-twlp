<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
        <?php
        	if(isset($_GET['deluser'])){
        		$delid = $_GET['deluser'];
        		$query = "DELETE FROM tbl_user WHERE user_id='$delid'";
        		$deluser = $db->delete($query);
        		if($deluser){
                        echo "<span class='success'>User Deleted successfully....</span>";
                    }else{
                        echo "<span class='error'>User Not deleted....</span>";
                }
        	}
        ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>E-mail</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$userquery = "SELECT * FROM tbl_user ORDER BY user_id DESC";
				$alluser = $db->select($userquery);
				if($alluser){
					$i = 0;
					while ($result = $alluser->fetch_assoc()) {
						$i++;
					
				
				
			?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['user_email']; ?></td>
							<td><?php echo $fm->textshorten($result['details']); ?></td>
							<td><?php 
									if($result['userrole'] == '0'){
										echo "Admin";
									}elseif($result['userrole'] == '1'){
										echo "Author";

									}elseif($result['userrole'] == '2'){
										echo "Editor";
									}
								?>
								
							</td>
						<td>
						<a href="viewuser.php?uid=<?php echo $result['user_id']; ?>">view</a>
						<?php
                            if(Session::get('UserRole') == '0'){ ?>
						 || <a onclick="return confirm('Are you sure want to Delete data')"; href="?deluser=<?php echo $result['user_id']; ?>">Delete
						 <?php } ?>
						</td>
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

