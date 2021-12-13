<?php ob_start();?>
    <link rel="stylesheet" href="./public/styles/course.css">
<?php $style = ob_get_clean();?>


<?php ob_start();?>
<div id="courseWrapper">
    <div id="displayCourse">
        <div>
            <h1> 
                <?= $course['name'];?>
            </h1>
            <h2>
                <?= $course['teacher'];?>
            </h2>
        </div>
        <?= '<img id="coursePic" src="'. $course['image'] . '">';?>
    </div>

    <div id="displayPosts">
    </div>

    <div id="displayStudentList">
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>