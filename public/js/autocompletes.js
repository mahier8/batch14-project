// Global variables

// the inputs
var searchTeacher = document.querySelector('input[name="autosearch"]'), 
searchStudent = document.querySelector('input[name="studentAutosearch"]'), 

// where we display the div dropdowns
teacherResults = document.getElementById('teacherResults'), 
studentResults = document.getElementById('studentResults'),

// allow to know which result is selected : -1 means "no selection"
selectedResult = -1; 
let studentsArr = [];

// data from the form needed for formData object
let courseId = document.getElementById('courseId').value;
let teacher;

// 2. function to search through the data and we pass keywords, role into the getTeachers function
function getUsers(keywords, role) { 
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=autocompleteUsers&keywords=' + keywords + '&role=' + role); 
    xhr.addEventListener('readystatechange', function() {
        let userObj = '';
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            userObj = JSON.parse(xhr.responseText); 
            console.log(userObj);
           displayResults(userObj, role);
        }
    });
    xhr.send(null);
}

// 4. function to choose and display the e.target from below
function chooseResult(result) {
    // we grab the div for the results (global variable) and set style
    teacherResults.style.display = "none"; 
    studentResults.style.display = "none";
    result.className = "" 
    selectedResult = -1; 
    // searchElement.focus(); 
}

// 3. function to display the results of the above AJAX request in dropdown divs
function displayResults(response, role) { 
    studentResults.value = '';
    teacherResults.value = '';
    if (role == '1')  { // if teacher
        teacherResults.style.display = response.length ? 'block' : 'none'; // We hide the container if we don't have results
        if (response.length) { // We do modify the results only if we have 
            var responseLen = response.length;
            teacherResults.innerHTML = ''; // We clear the results
            for (var i = 0, div ; i < responseLen ; i++) {
                    // div creation to show results
                    div = teacherResults.appendChild(document.createElement('div'));
                    div.classList.add("searchResults");
                    div.innerHTML = response[i].firstName + " " + response[i].lastName; // display the firstName + lastName in divs
                    div.addEventListener('click', function(e) {
                        e.preventDefault();
                        searchTeacher.value = e.target.textContent;
                        let teacherNameHeader = document.querySelector("#displayTeacherHeader");
                        console.log(teacherNameHeader);
                        teacherNameHeader.innerHTML = searchTeacher.value; // to change the text of the header above the input
                        teacher = teacherNameHeader.innerHTML;
                        searchTeacher.value = '';
                    });
                    document.body.addEventListener('click',() =>{
                        chooseResult(teacherResults)
                    })
                }
            }
        }   else if (role == '2') { // if student
                        
            // 1. empty
            // could be an if statement here saying if I already have the userObj, then I shouldnt reload it
            // let studentsSearch = document.querySelectorAll('#studentResults');
            // console.log(studentsSearch);
            // if (studentsSearch) {
            //     studentsSearch.forEach((item) => 
            //     {
            //     item.remove()
            //     console.log(item)   
            //     }
            //     );
            // }
            console.log(response);

            // We hide container if we no results and modify results if we have
            studentResults.style.display = response.length ? 'block' : 'none'; 
            if (response.length) {
            var responseLen = response.length;

            // 2. display
            for (var i = 0, div ; i < responseLen ; i++) {
                    div = studentResults.appendChild(document.createElement('div'));
                    // div.classList.add("searchResults"); to add styles to the search
                    // display firstName and lastName
                    div.innerHTML = response[i].firstName + " " + response[i].lastName; 
                    div.addEventListener('click', function(e) {
                        e.preventDefault();

                        // for the input
                        searchStudent.value = e.target.textContent;
                        // chooseResult(e.target); // i need this choose result function

                        let studentNameDiv = document.querySelector("#displayStudent");
                        let studentName = studentNameDiv.appendChild(document.createElement('div'));

                        studentNameDiv.classList.add("displayStudentsList"); 
                        // to change the text of the div next to the input
                        studentName.innerHTML += searchStudent.value + '\n'; 
                                                
                        studentsArr.push(searchStudent.value); 

                        // to empty the input after
                        console.log(studentsArr);
                        searchStudent.value = ''; 

                        // // limit to 10
                        // let tenLimit = studentsArr.slice(0, 10);
                        // console.log(tenLimit);

                        // // to reverse the order
                        // let reverseArr = studentsArr.slice().reverse();
                        // console.log(reverseArr);

                        userObj = '';
                });
                
                document.body.addEventListener('click',() =>{
                    chooseResult(studentResults)
                })
            }
        }
    }
}

//////////////////////////////////////////////////////////////////////////
////////////////////////////EXECUTION////////////////////////////////////
////////////////////////////////////////////////////////////////////////   

// 1. event listeners to enable enter, up, and down
searchTeacher.addEventListener('keyup', function(e) {
    var teacherDivs = teacherResults.querySelector('#teacherResults');

    // alert("im here"); i do enter into this event listener
    // means we cant go above the first div
    if (e.code == 38 && selectedResult > -1) { // If the key pressed is the up arrow and not above the top result div
        
        teacherDivs[selectedResult--].className = ''; // we move up and empty the class
        console.log(selectedResult);
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            teacherDivs[selectedResult].className = 'result_focus'; // we set the class
        }
    }

    // means we cant go below the last div
    else if (e.code == 40 && selectedResult < teacherDivs.length - 1) { // if the key pressed is the arrow bottom and not above the top result div
        alert("im here"); // why isnt this firing off???
        teacherResults.style.display = 'block'; // We display the results
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            teacherDivs[selectedResult].className = ''; // we empty the class
        }
        teacherDivs[++selectedResult].className = 'result_focus';//we move down and empty the class
        console.log(teacherDivs[selectedResult]);
    }
    else if (e.code == 13 && selectedResult > -1) { // if the key pressed is Enter
        chooseResult(teacherDivs[selectedResult]);
    } else {
        getUsers(searchTeacher.value, '1');
    }
});

// 1. event listeners to enable enter, up, and down
searchStudent.addEventListener('keyup', function(e) {
    var studentDivs = teacherResults.querySelector('#results');

    // alert("im here"); i do enter into this event listener
    // means we cant go above the first div
    if (e.code == 38 && selectedResult > -1) { // If the key pressed is the up arrow and not above the top result div
        
        studentDivs[selectedResult--].className = ''; // we move up and empty the class
        console.log(selectedResult);
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            studentDivs[selectedResult].className = 'result_focus'; // we set the class
        }
    }

    // means we cant go below the last div
    else if (e.code == 40 && selectedResult < studentDivs.length - 1) { // if the key pressed is the arrow bottom and not above the top result div
        alert("im here"); // why isnt this firing off???
        teacherResults.style.display = 'block'; // We display the results
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            studentDivs[selectedResult].className = ''; // we empty the class
        }
        studentDivs[++selectedResult].className = 'result_focus';//we move down and empty the class
        console.log(studentDivs[selectedResult]);
    }
    else if (e.code == 13 && selectedResult > -1) { // if the key pressed is Enter
        chooseResult(studentDivs[selectedResult]);
    } else {
        getUsers(searchStudent.value, '2');
    }
});

// form to assign course using courseID, teacher, student
let assignCourse = document.querySelector('#assignCourse');
assignCourse.addEventListener('click', function(e) {
    console.log('clicked');
    // the request
    var request = new XMLHttpRequest();
    request.open("POST", "index.php?action=assignCourses");

    // to create formdata object
    let formData = new FormData();
    formData.append('courseID', courseId);
    formData.append('teacher', teacher); // teacher 
    formData.append('students', studentsArr); // student

    request.send(formData);
});


