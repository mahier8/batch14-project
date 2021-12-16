<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/createCourse.css">
<?php $style = ob_get_clean();?>




<?php ob_start();?>
<div id="wrapper">
    <h1>
        Create Course
    </h1>
    <form action="index.php" method="POST">
        <input hidden name="action" value="addEditCourse">
        
        <p>
            <label for="courseName">Course Name:</label>
            <input type="text" name="courseName" id="courseName" required>
            
        </p>
    
        <p> 
            <label for="start">Start date:</label>
            <input type="date" id="start" name="start">
            <label for="end">End date:</label>
            <input type="date" id="end" name="end">
        </p>
        <p>
            <label for="courseDesc">Course Description:</label>
            <input type="text" name="courseDesc" id="courseDesc">
        </p>
        <input type="submit" value="Submit">
    </form>
</div>


<?php $content = ob_get_clean();?>
<?php require("template.php");?>