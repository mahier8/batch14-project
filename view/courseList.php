
<?php ob_start();?>
<link rel="stylesheet" href="./public/styles/courseList.css">
<?php $style = ob_get_clean();?>


<?php ob_start();?>

<div id="cardContainer">
            <h1>All Courses</h1>
            
                <?php
                try {
                    $db = new PDO('mysql:host=localhost;dbname=batch14_project;charset=utf8', 'root', '');

                } catch(Exception $e) {

                        die('Error : ' . $e->getMessage());
                }

                $response = $db->query("SELECT image, name, teacher, dayTime, nb_students FROM course_test ORDER BY id");

                while($data = $response->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <div class="courseCard">
                        <div class="courseImage">
                            <?php echo '<img src="' . $data['image'] . '">'?>
                        </div>

                        <div class="courseDetails">
                            <?php 

                            echo $data['name'] . 
                            '<br>' . $data['teacher'] . 
                            '<br>' . $data['dayTime']
                            ?>
                        </div>
                        
                        <div class="courseStudents">
                            <i class="fas fa-users"></i><?php echo $data['nb_students']?>
                        </div>

                    </div>

                <?php
                    }
                    ?>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>