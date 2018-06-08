<?php include 'inc/header.php' ?>
<?php if(!Session::get('UserRole') == '0') {
    echo "<script>window.location = 'index.php';</script>";
}
?>
<style>
	.success{
		font-size: 24px;
		color:green;
	}
	.error{
		font-size: 24px;
		color:red;
	}
</style>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php if(isset($_GET['seenid'])){
                	$seenid = $_GET['seenid'];
                	$query = "UPDATE tbl_contact SET status= '1' WHERE con_id='$seenid'";
                    $updaterow = $db->update($query);
                    if($updaterow){
                        echo "<span class='success'>Message Sent in the seen box....</span>";
                    }else{
                        echo "<span class='error'>Something went wrong!...</span>";
                    }
                }
                else{
                	if(isset($_GET['unseenid'])){
                	$unseenid = $_GET['unseenid'];
                	$query = "UPDATE tbl_contact SET status= '0' WHERE con_id='$unseenid'";
                    $updaterow = $db->update($query);
                    if($updaterow){
                        echo "<span class='success'>Message Sent in the before box....</span>";
                    }else{
                        echo "<span class='error'>Something went wrong!...</span>";
                    }
                   }

                }

                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY con_id DESC";
							$msg = $db->select($query);
							if($msg){
								$i = 0;
								while ($result = $msg->fetch_assoc()) {
									$i++;
					
				
				
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['message'],30);?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['con_id'];?>">View</a> ||
								<a href="replymsg.php?msgid=<?php echo $result['con_id'];?>">Reply</a> ||
								<a onclick="return confirm('Are you sure want to move seen box')"; href="?seenid=<?php echo $result['con_id'];?>">Seen</a> 
							</td>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
               </div>
        </div>

            <div class="box round second grid">
                <h2>Seen Message</h2>
               <?php
		        	if(isset($_GET['delid'])){
		        		$delid = $_GET['delid'];
		        		$query = "DELETE FROM tbl_contact WHERE con_id='$delid'";
		        		$delcontact = $db->delete($query);
		        		if($delcontact){
		                        echo "<span class='success'>Message Deleted successfully....</span>";
		                    }else{
		                        echo "<span class='error'>Message Not deleted....</span>";
		                }
		        	}
        	?>
                <div class="block">        
                     <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "SELECT * FROM tbl_contact WHERE status='1' ORDER BY con_id DESC";
							$msg = $db->select($query);
							if($msg){
								$i = 0;
								while ($result = $msg->fetch_assoc()) {
									$i++;
					
				
				
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['message'],30);?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['con_id'];?>">View</a> ||
								<a onclick="return confirm('Are you sure want to unseen Data')"; href="?unseenid=<?php echo $result['con_id'];?>">UnSeen</a> ||
							
								<a onclick="return confirm('Are you sure want to Delete data')"; href="?delid=<?php echo $result['con_id'];?>">Delete</a>
							</td>
								
						</tr>
					<?php }} ?>
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