
       <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                        <?php if(Session::get('UserRole') == '0') {?>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        <?php } ?>
                        </li>
                        
                         <li><a class="menuitem">Page Option</a>
                    <?php if(Session::get('UserRole') == '0') {?>
                            <ul class="submenu">
                                <li><a href="addpage.php">Add New Page</a> </li>
            <?php
                $query = "SELECT * FROM tbl_page";
                $page = $db->select($query);
                if($page){
                    while ($result = $page->fetch_assoc()){
                    
            ?>   
                <li><a href="page.php?pageid=<?php echo $result['p_id'];?>"><?php echo $result['p_name'];?></a> </li>
            <?php } } ?>
                            </ul>
                        <?php } ?>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            
                                <?php if(Session::get('UserRole') == '0' || Session::get('UserRole') == '2') { ?>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                                <?php } ?>
                            
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                         <li><a class="menuitem">Slider Option</a>
                            <?php if(Session::get('UserRole') == '0') {?>
                            <ul class="submenu">
                                <li><a href="addslider.php">Add Slider</a> </li>
                                <li><a href="sliderlist.php">Slider List</a> </li>
                            </ul>
                             <?php } ?>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>