
<?php ob_start(); ?>
    <link rel="stylesheet" href="./public/styles/courseList.css">
    <?php $style= ob_get_clean();?>
<?php ob_start();?>

<div id="clContentContainer">

    <div id="cardContainer">
            <h1 id="courseTitle">All Courses</h1> 
            
            <div id="courseButtonTop">
            <a href="#"><div>Add Course<i class="fas fa-plus"></i></div></a>
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
                            <div
                                <?php 
                                if ($_SESSION['userRole'] == 'admin') {
                                    echo 'class="courseBtn"';
                                } else {
                                    echo 'class="elementHidden';
                                }
                                ?>
                            >
                                <a href="#"><i class="fas fa-edit"></i></a>
                                <a href="#"><i class="fas fa-trash" ></i></a>
                            </div>
                        </div>
                    </div>

             <?php endforeach;?>
            
    </div>
    <div id="announce">announcements</div>
</div>


            
<?php $content = ob_get_clean();?>
<?php require("template.php");?>