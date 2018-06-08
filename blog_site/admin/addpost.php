<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $title   = mysqli_real_escape_string($db->link, $_POST['title']);
                $cat_id  = mysqli_real_escape_string($db->link, $_POST['cat_id']);
                $body    = mysqli_real_escape_string($db->link, $_POST['body']);
                $tag     = mysqli_real_escape_string($db->link, $_POST['tag']);
                $author  = mysqli_real_escape_string($db->link, $_POST['author']);
                $des  = mysqli_real_escape_string($db->link, $_POST['des']);
                $userid  = mysqli_real_escape_string($db->link, $_POST['userid']);
                  if(isset($_FILES['image']['name'])){
                            $file_name = $_FILES['image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $size = $_FILES['image']['size'];
                            $type = $_FILES['image']['type'];

                        }
                    else{
                        $file_name = '';
                    }
                    $errors = array();
                    if(isset($title,$cat_id,$body,$tag,$author,$file_name,$des)){
                        if(empty($title) && empty($cat_id) && empty($body) && empty($tag) && empty($author) && empty($file_name) && empty($des)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($title)){
                                $errors[] = "Title field are required";
                            }
                            if(empty($cat_id)){
                                $errors[] = "cat_id field are required";
                            }
                            if(empty($body)){
                                $errors[] = "description field are required";
                            }
                            if(empty($tag)){
                                $errors[] = "tag field are required";
                            }
                            if(empty($author)){
                                $errors[] = "author field are required";
                            }
                            if(empty($file_name)){
                                $errors[] = "upload field are required";
                            }
                             if(empty($des)){
                                $errors[] = "metadescription field are required";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']) )) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                            }
                 
                            move_uploaded_file($tmp_name, 'upload/'.$newFile);
                            $query = "INSERT INTO tbl_post(cat_id,title,body,image,author,tags,metades,userid) 
                            VALUES('$cat_id','$title','$body','$newFile','$author','$tag','$des','$userid')";
                            $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                              echo "<span class='success'>Post Inserted Successfully.
                             </span>";
                           } else {
                              echo "<span class='error'>Post Not Inserted !</span>";
                           }

                        
                    }
                }

                    
            }
        
    ?>
                <div class="block">               
                 <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat_id">
                                    <option value="">--Select category--</option>
                    <?php
                        $query = "SELECT * FROM tbl_category";
                        $category = $db->select($query);
                        if($category){
                            while($result = $category->fetch_assoc()){
                        
                    ?>
                                    <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                            <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Description</label>
                            </td>
                            <td>
                                <input type="text" name="des" placeholder="Enter meta Description..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Enter tags here..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo Session::get('username');?>" class="medium" />
                                <input type="hidden" name="userid" value="<?php echo Session::get('userId');?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
            });
</script>
<?php include 'inc/footer.php' ?>
 <!-- Load TinyMCE -->

