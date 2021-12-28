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
            <div id="displayTeacherHeader">
               <h2>
                   <?= $course['teacher'];?>
                </h2> 
            </div>    
        </div>
        <?= '<img id="coursePic" src="'. $course['image'] . '">';?>
    </div>

    <!-- this is for the autocompletes step 1, for the input and a div to show the results -->
    <div id="displayLists" data-courseid=<?=$_GET['courseid']?>>
        <div id="displayTeacherList">
            <div id="displayForm">
                <div>
                    <input type="hidden" name="action" value="assignCourse">
                    <input type="hidden" id="courseId" name="courseId" value="<?php $course['id']; ?>">
                    <div id="teacherSearch">
                        <input type="text" name="autosearch" id="autoseachInput" placeholder="Search teachers" autocomplete="off">                        
                        <div id="teacherResults">
                        </div>
                    </div>

                    <div id="studentsSearch">
                        <input type="text" name="studentAutosearch" id="studentAutosearchInput" placeholder="Search students" autocomplete="off">                        
                        <div id="studentResults">
                        </div>
                    </div>
                </div>
                
                <div id="displayTeacherDiv">
                    <!-- <a href="#"><i class="fas fa-trash" ></i></a>  -->
                    <div id="displayStudent">
                        <!-- <?= $course['student'];?>  -->
                        <!-- Do i need to read from the database and display for the student -->
                    </div>
                <button id="assignCourse">Submit</button>    
            </div>
        </div>

        <div id="displayStudentList">
            
        </div>
    </div>
</div>

<script src="./public/js/autocompletes.js"></script>

<?php $content = ob_get_clean();?>
<?php require("template.php");?>

