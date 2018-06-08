<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">
        <?php if(isset($_GET['pubid'])){
                	$pubid = $_GET['pubid'];
                	$query = "UPDATE tbl_post SET status= '0' WHERE id='$pubid'";
                    $updaterow = $db->update($query);
                    if($updaterow){
                        echo "<span class='success'>Message has been publis....</span>";
                    }else{
                        echo "<span class='error'>Something went wrong!...</span>";
                    }
        	}
         	else{
                	if(isset($_GET['unpubid'])){
                	$unpubid = $_GET['unpubid'];
                	$query = "UPDATE tbl_post SET status= '1' WHERE id='$unpubid'";
                    $updaterow = $db->update($query);
                    if($updaterow){
                        echo "<span class='success'>Message has been unpublis....</span>";
                    }else{
                        echo "<span class='error'>Something went wrong!...</span>";
                    }
                   }

                }
               ?>  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="10%">Post Title</th>
							<th width="12%">Description</th>
							<th width="6%">Tags</th>
							<th width="5%">meta des</th>
							<th width="5%">Category</th>
							<th width="10%">Image</th>
							<th width="5%">Author</th>
							<th width="10%">Date</th>
							<th width="22%">Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$query = "SELECT tbl_post.*,tbl_category.cat_name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat_id = tbl_category.cat_id ORDER BY tbl_post.title DESC";
					$post = $db->select($query);
					$i = 0;
					foreach($post as $key => $result){
						$i++;
							
				?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title']; ?></td>
							<td><?php echo $fm->textshorten($result['body'],30); ?></td>
							<td class="center"> <?php echo $result['tags']; ?></td>
							<td><?php echo $fm->textshorten($result['metades'],15); ?></td>
							<td><?php echo $result['cat_name'] ?></td>
							<td><img src="<?php echo 'upload/'.$result['image'];?>" width='60px' height='40px'></td>;
							<td><?php echo $result['author']; ?></td>

							<td class="center"> <?php echo $fm->formatDate($result['date']); ?></td>
							<td>
								<a href="viewpost.php?viewpostid=<?php echo $result['id'] ?>">view</a>
						<?php
							if(Session::get('userId') == $result['userid'] ||  Session::get('UserRole') == '0') {?>
							||
							<a href="editpost.php?editpostid=<?php echo $result['id'] ?>">Edit</a> ||
							 <a onclick="return confirm('Are you sure want to delete data..!')"; href="deletepost.php?delpostid=<?php echo $result['id'] ?>">Delete</a>
							

						<?php } ?>
								
						<?php if(Session::get('UserRole') == '0') {?>
							|| <a onclick="return confirm('Are you sure want to move seen box')"; href="?pubid=<?php echo $result['id'];?>">Publis</a> ||
							<a onclick="return confirm('Are you sure want to move seen box')"; href="?unpubid=<?php echo $result['id'];?>">Unpublis</a>
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
