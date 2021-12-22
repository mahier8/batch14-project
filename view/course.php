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
                    echo $course['startDate'];
                }?> <?php if (isset($course['endDate']) && $course['endDate'] != null){
                    echo 'to' . $course['endDate'];
                }?>
            </h3>
        </div>
        <?= '<img id="coursePic" src="'. $course['image'] . '">';?>
    </div>

    <div id="postFormDiv">
        <form action="course.php" method="post" id="postForm">
                <h4>Create a Post</h4>

                <label for="formPostTitle">Post Title</label>
                <input type="text" name="formPostTitle" id="formPTitle">

                <label for="formPostContent">Post Content</label>
                <textarea name="formPostContent" id="formPContent"></textarea>


                
                <p>Post Link 1</p>
                <label for="formPostLink3Type">File Type:</label>
                    <select name="formPostLink3Type" id="formPostLink3Type">
                    <option value="radio" name="formPostLink3Type">File</option>
                    <option value="radio" name="formPostLink3Type">Video</option>
                    <option value="radio" name="formPostLink3Type">Document</option>

                <label for="formPostLink1">File URL:</label>
                <input type="url" name="formPostLink1" id="formPLink1" placeholder="Enter a URL">
            
            <p>Post Link 2</p>
                <label for="formPostLink3Type">File Type:</label>
                    <select name="formPostLink3Type" id="formPostLink3Type">
                    <option value="radio" >File</option>
                    <option value="radio" name="formPostLink3Type">Video</option>
                    <option value="radio" name="formPostLink3Type">Document</option>

                <label for="formPostLink2">File URL:</label>
                <input type="url" name="formPostLink2" id="formPLink2" placeholder="Enter a URL">
       
            <p>Post Link 3</p>
                    <label for="formPostLink3Type">File Type:</label>
                    <select name="formPostLink3Type" id="formPostLink3Type">
                    <option value="radio" >File</option>
                    <option value="radio" name="formPostLink3Type">Video</option>
                    <option value="radio" name="formPostLink3Type">Document</option>

                <label for="formPostLink3">File URL:</label>
                <input type="url" name="formPostLink3" id="formPLink3" placeholder="Enter a URL">  

                <label for="formPostDueDate">Due Date (Optional)</label>
                <input type="date" name="formPostDueDate" id="formPTitle">
        </form>
    
    </div>
    <div id="displayPosts">
        
        <div class="postContainer">
            <div class="postHeader blueStyle">
                <h2>Post</h2>
            </div>
            <div class="postContent">
                <h2 class="postTitle">Ducks</h2>
                <h4>Date: 21/12/2021</h4>
                <p>Duck is the common name for numerous species of waterfowl in the family Anatidae. Ducks are generally smaller and shorter-necked than swans and geese, which are members of the same family. Divided among several subfamilies, they are a form taxon; they do not represent a monophyletic group (the group of all descendants of a single common ancestral species), since swans and geese are not considered ducks. Ducks are mostly aquatic birds, and may be found in both fresh water and sea water.

                Ducks are sometimes confused with several types of unrelated water birds with similar forms, such as loons or divers, grebes, gallinules and coots.</p>

                <div>Files:
                    <ul class="postFiles">
                        <li>Video: <a href="#">Video 1</a></li>
                        <li>Video: <a href="#">Video 2</a></li>
                        <li>Document: <a href="#">Document 3</a></li>
                    </ul>
                </div>
                <h3>Due Date: 12/07/2022</h3>
            </div>

        </div>

    </div>

            
        </div>
        
    </div>

    <div id="displayPosts">
    </div>

    <div id="displayStudentList">
    </div>
</div>




<?php $content = ob_get_clean();?>
<?php require("template.php");?>

<!-- Teachers need to be able to create posts within the course view. 
- posts need their own db table
- teachers and admin need privileges to make posts
- post types need to be handled. 
- posts needed to be expandable boxes.
Type 1 - character limit and expand button
Type 2 (when expand pressed) - entire post shown

Login Hide and Comments can be added later if there's time.
-->
