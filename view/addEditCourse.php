<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/addEdit.css">
<?php $style = ob_get_clean();?>




<?php ob_start();
$courseid = isset($course) ? $course['id'] : "";
$courseName = isset($course) ? $course['name'] : "";
$courseTeacher = isset($course) ? $course['teacher'] : "";
$dayTime = isset($course) ? $course['dayTime'] : "";
$startDate = isset($course) ? $course['startDate'] : "";
$endDate = isset($course) ? $course['endDate'] : "";
$courseDesc = isset($course) ? $course['courseDesc'] : "";
?>

<div class="mainContent" id="courseContainer" >

    <h1 class="centerText">
        Create/Edit Course
    </h1>
    <form action="index.php" method="POST" name="addEditCourse" id="addEditCourse">
        <input type="hidden" name="action" value="addEditCourse">
        <?php if (isset($course)) :?>
            <input type="hidden" name="edit" value="1">
            <input type="hidden" name="courseid" value="<?=$courseid?>">
        <?php endif;?>
            <span for="courseName">Course Name:</span>
            <input type="text" name="courseName" id="courseName" value="<?=$courseName?>" required>  
        <p>
            <label for="courseTeacher">Course Teacher:</label>
            <input type="text" name="courseTeacher" id="courseTeacher" value="<?=$courseTeacher?>" required>  
        </p>

        <p>
            <label for="courseDayTime">Course Days and Time:</label><br>
            <input type="text" id="courseTime" name="courseDayTime" value="<?=$dayTime?>">   
        </p>
        <p> 
            <label for="start">Start date:</label>
            <input type="date" id="start" name="start" value="<?=$startDate?>">
            <label for="end">End date:</label>
            <input type="date" id="end" name="end" value="<?=$endDate?>">
        </p>
        <p>
            <label for="courseDesc">Course Description:</label>
            <textarea name="courseDesc" id="courseDesc"><?=$courseDesc?></textarea>
        </p>
        <input class="greenStyle btn" type="submit" id="addEditSubmit" value="Submit">
    </form>
</div>


<?php $content = ob_get_clean();?>
<?php require("template.php");?>