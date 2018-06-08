<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if(!isset($_GET['editpostid']) || $_GET['editpostid'] == null){
        echo "<script>window.location = 'postlist.php';</script>";
        
    }
    else
    {
        $postid = $_GET['editpostid'];
    }
    

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $title   = mysqli_real_escape_string($db->link, $_POST['title']);
                $cat_id  = mysqli_real_escape_string($db->link, $_POST['cat_id']);
                $body    = mysqli_real_escape_string($db->link, $_POST['body']);
                $tag     = mysqli_real_escape_string($db->link, $_POST['tag']);
                $des     = mysqli_real_escape_string($db->link, $_POST['des']);
                $author  = mysqli_real_escape_string($db->link, $_POST['author']);
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
                    if(isset($title,$cat_id,$body,$tag,$author,$des)){
                        if(empty($title) && empty($cat_id) && empty($body) && empty($tag) && empty($author) && empty($tag)){
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
                            if(empty($des)){
                                $errors[] = "meta description field are required";
                            }
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                           if(!empty($file_name)){
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                              move_uploaded_file($tmp_name, 'upload/'.$newFile);
                                $query1 = "UPDATE tbl_post SET 
                                        cat_id = '$cat_id',
                                        title = '$title',
                                        body = '$body',
                                        image = '$newFile',
                                        author = '$author',
                                        tags = '$tag',
                                        metades = '$des',
                                        userid = '$userid'
                                        WHERE id='$postid'";
                                $updated_row = $db->update($query1);
                                if ($updated_row) {
                                  echo "<span class='success'>Data updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>Data Not updated !</span>";
                               }
                            }
                            else{
                                    $query1 = "UPDATE tbl_post SET 
                                        cat_id = '$cat_id',
                                        title = '$title',
                                        body = '$body',
                                        author = '$author',
                                        tags = '$tag',
                                        metades = '$des',
                                        userid = '$userid'
                                        WHERE id='$postid'";
                                $updated_row = $db->update($query1);
                                if ($updated_row) {
                                  echo "<span class='success'>Data updated Successfully.
                                 </span>";
                               } else {
                                  echo "<span class='error'>Data Not updated !</span>";
                               }

                            }
                
                            

                      }
                 }

                    
            }
        
    ?>
                <div class="block"> 
            <?php
                $query = "SELECT * FROM tbl_post WHERE id='$postid' ORDER BY id DESC";
                $row = $db->select($query);
               foreach($row as $key => $postvalue){

            ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postvalue['title'];?>" class="medium" />
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
                                    <option
                                    <?php
                                        if($postvalue['cat_id'] == $result['cat_id']){ ?>
                                            selected= 'selected';
                                   <?php } ?>
                                     value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                            <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo 'upload/'.$postvalue['image'];?>" width='60px' height='40px'>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body" >
                                    <?php echo $postvalue['body'];?>
                                </textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Description</label>
                            </td>
                            <td>
                                <input type="text" name="des" value="<?php echo $postvalue['metades'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" value="<?php echo $postvalue['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                     <input type="text" name="author" value="<?php echo $postvalue['author'];?>" class="medium" />
                     <input type="hidden" name="userid" value="<?php echo Session::get('userId');?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }  ?>
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

