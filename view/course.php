<?php ob_start();?>
    <link rel="stylesheet" href="./public/styles/course.css">
<?php $style = ob_get_clean();?>


<?php ob_start();?>
<div id="courseWrapper">
    <div id="displayCourse">
        <div>
            <h1>
                <?php print_r ($course); 
                
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
                }?> to <?php if (isset($course['endDate'])){
                    echo $course['endDate'];
                }?>
            </h3>
            
        </div>
        
    </div>

    <div id="displayPosts">
    </div>

    <div id="displayStudentList">
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>