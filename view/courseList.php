<?php ob_start(); ?>
    <link rel="stylesheet" href="./public/styles/courseList.css">
    <?php $style= ob_get_clean();?>
<?php ob_start();?>

<div id="clContentContainer">
    <a href="#" id="addCourse">
                <div
                    <?php 
                        if ($_SESSION['userRoleDesc'] == 'Admin') {
                        echo 'class="greenStyle btn';
                        } else {
                        echo 'class="elementHidden';
                        }
                        ?>
                >
                
                <i class="fas fa-plus greenStyle"></i>Add New Course
                </div>
            </a>
    <div id="cardContainer">
        <div class="blueStyle">
            
            <h1 class="courseTitle">All Courses</h1> 

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
                            '<br><br>' . $course['teacher'] . 
                            '<br>' . $course['dayTime']
                            ?>
                        </div>

                        <div id="courseRight">
                        <div class="courseStudents">
                                <i class="fas fa-users"></i><?php echo $course['nbStudents']?>
                            </div>
                            <div
                                <?php 
                                if ($_SESSION['userRoleDesc'] == 'Admin') {
                                    echo 'class="greenReverse courseBtn"';
                                } else {
                                    echo 'class="elementHidden';
                                }
                                ?>
                            >
                                <a href="#"><i class="fas fa-edit greenLink"></i></a>
                                <a href="#"><i class="fas fa-trash greenLink"></i></a>
                            </div>
                        </div>
                    </div>

             <?php endforeach;?>
            
    </div>
        <div id="courseButtonTop">


        </div>
        
    </div>
    <!-- <div id="announce">announcements</div> -->
</div>


            
<?php $content = ob_get_clean();?>
<?php require("template.php");?>