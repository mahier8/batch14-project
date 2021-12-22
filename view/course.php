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
            <h2 id="displayTeacherHeader">
                <?= $course['teacher'];?>
            </h2>
        </div>
        <?= '<img id="coursePic" src="'. $course['image'] . '">';?>
    </div>

    <!-- this is for the autocompletes step 1, for the input and a div to show the results -->
    <div id="displayLists" data-courseid=<?=$_GET['courseid']?>>
        <div id="displayTeacherList">
            <div id="displayForm">
                <form name="assignTo" autocomplete="off" action="index.php" method="POST">
                    <div id="teacherSearch">
                        <input type="text" name="autosearch" id="autoseachInput" placeholder="Search teachers">                        
                        <div id="results">
                        </div>
                    </div>

                    <!-- <div id="studentsSearch">
                        <input type="text" name="autosearch" id="autoseachInput" placeholder="Search students">                        
                        <div id="results">
                        </div>
                    </div> -->
                </form>
            </div>
            <div id="displayTeacherDiv">
                <a href="#"><i class="fas fa-trash" ></i></a> 
                <div id="displayTeacher">
                    <?= $course['teacher'];?>
                </div>
            <button id="addTeacherButton">Submit</button>    
            </div>
        </div>

        <!-- we will need to create a similar autocomplete layout for the students as well -->
        <div id="displayStudentList">
            
        </div>
    </div>
    
</div>

<script src="./public/js/autocompletes.js"></script>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>

