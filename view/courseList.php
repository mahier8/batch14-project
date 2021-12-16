<?php
$_SESSION['userRole'] = $_SESSION['userRoleDesc'];


 ob_start(); ?>
    <link rel="stylesheet" href="./public/styles/courseList.css">
<?php $style= ob_get_clean();?>


<?php ob_start();?>

<div id="cardContainer">
            <h1>All Courses</h1> 
            
            <div id="courseButtonTop">
                <div>Add Course<i class="fas fa-plus"></i></div>
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
                            echo '<a href="action=coursePage&courseid=' . $course['id']  . '">' . $course['name'] . '</a>' .
                            '<br>' . $course['teacher'] . 
                            '<br>' . $course['dayTime']
                            ?>
                        </div>

                        <div id="courseRight">
                        <div class="courseStudents">
                                <i class="fas fa-users"></i><?php echo $course['nbStudents']?>
                            </div>
                            <div class="courseBtn">
                                <a href="#"><i class="fas fa-edit"></i></a>
                                <a href="#"><i class="fas fa-trash" ></i></a>
                            </div>

                        </div>

                    </div>

            <?php endforeach;?>

            <script src="./js/courseList.js"></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");?>