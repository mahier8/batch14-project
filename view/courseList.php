<?php  ob_start(); ?>
    <link rel="stylesheet" href="./public/styles/courseList.css">
<?php $style= ob_get_clean();?>

<?php ob_start();?>
<div id="cardContainer">
    <h1>All Courses</h1> 
    <div id="courseButtonTop">
        <div><a href="index.php?action=addEditCourseForm">Add Course<i class="fas fa-plus"></i></a></div>
    </div>   
    <?php foreach ($courses AS $course):?>
        
        <div class="courseCard">

            <div class="courseImage">
                <?php 
                    if ($course['image'] != null) {
                        echo '<img src="' . $course['image'] . '">';
                    } else {
                        echo '<img src=".\public\styles\images\courseDefault.jpg">';
                        
                    }
                ?>
            </div>

            <div class="courseDetails">
                <?php 
                echo '<a href="index.php?action=course&courseid=' . $course['id']  . '">' . $course['name'] . '</a>' .
                '<br>' . $course['teacher'] . 
                '<br>' . $course['dayTime']
                ?>
            </div>

            <div id="courseRight">
            <div class="courseStudents">
                    <i class="fas fa-users"></i><?php echo $course['nbStudents']?>
                </div>
                <div class="courseBtn">
                    <a href="index.php?action=addEditCourseForm&courseid=<?=$course['id']?>"><i class="fas fa-edit"></i></a>
                    <a href="index.php?action=deleteCourse&courseid=<?=$course['id']?>"><i class="fas fa-trash" ></i></a>
                </div>

            </div>

        </div>

    <?php endforeach;?>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>