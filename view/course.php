<?php ob_start();?>
    <link rel="stylesheet" href="./public/styles/course.css">
<?php $style = ob_get_clean();?>



<?php ob_start();?>


<div id="courseWrapper">
    <div id="displayCourse">
        <div>
            <h1>
                <?php 
                
                if (isset($course['name'])){
                    echo $course['name'];
                }?>
            </h1>
            <h2>
                <?php if (isset($course['teacher'])){
                    echo $course['teacher'];
                }?>
            </h2>
            <!-- -->
            <h3>
                <?php if (isset($course['courseDesc'])){
                    echo $course['courseDesc'];
                }?>
            </h3>
            <h3>
                <?php if (isset($course['startDate'])){
                    echo 'Start Date: ' . $course['startDate'];
                }?> <?php if (isset($course['endDate']) && $course['endDate'] != null){
                    echo 'to' . $course['endDate'];
                }?>
            </h3>
        </div>
        <?= '<img id="coursePic" src="'. $course['image'] . '">';?>
    </div>



    <div id="postFormDiv">
        <div id="create"  class="postHeader greenStyle">
            <h2 id="createh2">Create Post</h2>
        </div>
        <div id="hiddenCourseId" class="elementHidden"><?php echo $course['id']?></div>
        <div id="update" class="elementHidden"> 
            <h2 id="updateh2" class="elementHidden postHeader pinkStyle"> Edit Post</h2> 
        </div>

        <div id="postFormShow">
            <button type="button" class="blueStyle btn" id="expandForm">Start</button>

            <form method="post" id="pfHide" action="">

                <div id="pfTypeDiv">
                    <label for="pfType">Post Type: </label>
                        <select name="pfType" id="pformType">
                            <option value="General" name="General">General</option>
                            <option value="Announcement" name="Announcement">Announcement</option>
                            <option value="Assignment" name="Assignment">Assignment</option>
                        </select>
                </div>

            <div id="pfTitleDiv">
                <label for="pfTitle">Post Title</label>
                <input type="text" name="pfTitle" id="pfTitleInput" placeholder="Enter a title">
            </div>

            

            <div id="pfContentDiv">
                <label for="pfContent">Post Content</label>
                <textarea placeholder="Enter post" name="pfContent" id="pfContentInput"></textarea>
            </div>

            <div id="postAttachContainer">
                <p>Attachments</p>

                <div class="postAttach">
                    <label for="pfLink1Name">File Name: </label>
                    <input type="text" name="pfLink1Name" id="pFormLink1Name">

                    <label for="pfLink1Type">File Type: </label>
                    <select name="pfLink1Type" id="pFormLink1Type">
                        <option value="File" name="File">File</option>
                        <option value="Video" name="Video">Video</option>
                        <option value="Document" name="Document">Document</option>
                    </select>

                    <label for="pfLink1URL">File URL: </label>
                    <input type="url" name="pfLink1URL" id="pFormLink1" placeholder="Enter a URL">

                </div>

                <div class="postAttach">
                    <label for="pfLink2Name">File Name:</label>
                    <input type="text" name="pfLink2Name" id="pFormLink2Name">

                    <label for="pfLink2Type">File Type:</label>
                    <select name="pfLink2Type" id="pFormLink2Type">
                        <option value="File" name="File">File</option>
                        <option value="Video" name="Video">Video</option>
                        <option value="Document" name="Document">Document</option>
                    </select>

                    <label for="pfLink2URL">File URL:</label>
                    <input type="url" name="pfLink2URL" id="pFormLink2" placeholder="Enter a URL">
                </div>

                <div class="postAttach">
                    <label for="pfLink3Name">File Name:</label>
                    <input type="text" name="pfLink3Name" id="pFormLink3Name">

                    <label for="pfLink3Type">File Type:</label>
                    <select name="pfLink3Type" id="pfLink3Type">
                        <option value="File" name="File">File</option>
                        <option value="Video" name="Video">Video</option>
                        <option value="Document" name="Document">Document</option>
                    </select>

                    <label for="pfLink3URL">File URL:</label>
                    <input type="url" name="pfLink3URL" id="pFormLink3" placeholder="Enter a URL">  


                </div>
            </div>
            
            <div id="pfDueDiv">
                <label for="pfDueDate">Due Date (Optional)</label>
                <input type="date" name="pfDueDate" id="pFormDueDate">
            
                
            </div>
            <input type="hidden" name="hiddenid" value=" ">
            <input type="button" class="greenStyle btn" id="pfCancelBtn" value="Cancel">
            <input type="submit" class="greenStyle btn" id="pfSubmitBtn" value="Submit">
            
        </form>
    </div>
            </div>

<div id="displayPosts">

<?php foreach ($posts as $post) { ?>

    <div class="postContainer"> 

        <div class="postHeader blueStyle">
            <h2><?php echo $post['type'] ?> Post</h2>
        </div>

        <div class="postTitleDiv">
            <h2 class="postTitle"><?= $post['title']?>  </h2>

        </div>
        
        <div class="postContent">

            
            <h4>Posted: <?= $post['post_date'] ?></h4>
            <p><?= $post['content'] ?></p>

            <div>Files:
                <ul class="postFiles">
                    
                    <?php if ($post['file1_name']) {
                        echo '<li>' . $post['file1_type'] . ': <a href="' . $post['file1_link'] . '">' . $post['file1_name'] . '</a></li>'; 
                        } else {
                            echo '<li class="elementHidden">  <a> </a> </li>';
                        } ?>
                    <?php if ($post['file2_name']) {
                        echo '<li>' . $post['file2_type'] . ': <a href="' . $post['file2_link'] . '">' . $post['file2_name'] . '</a></li>'; 
                    } else {
                        echo '<li class="elementHidden">  <a> </a> </li>';
                    } ?>
                    <?php if ($post['file3_name']) {
                        echo '<li>' . $post['file3_type'] . ': <a href="' . $post['file3_link'] . '">' . $post['file3_name'] . '</a></li>';
                    } else {
                        echo '<li class="elementHidden">  <a> </a> </li>';
                    } ?>
                </ul>
            </div>

            <?php if ($post['due_date'] != '0000-00-00') {
                    echo '<h3>Due Date: <br>';
                    echo   $post['due_date'] . '</h3>';
                    }; ?>

            <div class="postEditDiv">
                <button class="postEditBtn greenStyle btn">Edit Post</button>
            </div>

            <?php if ($post['id']) {
                echo '<div id="hiddenid">' .  $post['id'] .'</div>'; 
            }
            
            ?>
        </div> 
    </div>
<?php
};
?>  

</div>


    <div id="displayPosts">
    </div>

    <div id="displayStudentList">
    </div>
</div>

<script src="./public/js/course.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>

