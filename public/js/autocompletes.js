// Global variables

// the inputs
var searchTeacher = document.querySelector('input[name="autosearch"]'),
  searchStudent = document.querySelector('input[name="studentAutosearch"]'),
  // where we display the div dropdowns
  teacherResults = document.getElementById("teacherResults"),
  studentResults = document.getElementById("studentResults"),
  iconDisplayStudent = document.querySelectorAll(".iconDisplayStudent"),
  // allow to know which result is selected : -1 means "no selection"
  selectedResult = -1;
let studentsArr = [];
for(let i = 0; i < iconDisplayStudent.length; i++) {
  let iconAttribute = iconDisplayStudent[i].getAttribute("studentid");
  studentsArr.push(iconAttribute);
  
}

// data from the form needed for formData object
let courseId = document.getElementById("courseId").value;
let teacher = document.getElementById("teacherHeader");

// 2. function to search through the data and we pass keywords, role into the getTeachers function
function getUsers(keywords, role) {
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "index.php?action=autocompleteUsers&keywords=" + keywords + "&role=" + role
  );
  xhr.addEventListener("readystatechange", function () {
    let userObj = "";
    if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
      userObj = JSON.parse(xhr.responseText);
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
  result.className = "";
  selectedResult = -1;
  // searchElement.focus();
}

// 3. function to display the results of the above AJAX request in dropdown divs
function displayResults(response, role) {
  studentResults.value = "";
  teacherResults.value = "";
  studentResults.innerHTML = "";
  if (role == "1") {
    // if teacher
    teacherResults.style.display = response.length ? "block" : "none"; // We hide the container if we don't have results
    if (response.length) {
      // We do modify the results only if we have
      var responseLen = response.length;
      teacherResults.innerHTML = ""; // We clear the results
      for (var i = 0; i < responseLen; i++) {
        // div creation to show results
        div = teacherResults.appendChild(document.createElement("div"));
        div.classList.add("searchResults");
        div.innerHTML = response[i].firstName + " " + response[i].lastName; // display the firstName + lastName in divs
        div.addEventListener("click", function (e) {
          e.preventDefault();
          searchTeacher.value = e.target.textContent;
          // let teacherNameHeader = document.querySelector("#displayTeacherHeader");
          // teacherNameHeader.innerHTML = searchTeacher.value; // to change the text of the header above the input
          // teacher = teacherNameHeader.innerHTML;
          teacher.textContent = searchTeacher.value;
          searchTeacher.value = "";
        });
        document.body.addEventListener("click", () => {
          chooseResult(teacherResults);
        });
      }
    }
  } else if (role == "2") {
    // if student

    // We hide container if we no results and modify results if we have
    studentResults.style.display = response.length ? "block" : "none";
    if (response.length) {
      var responseLen = response.length;

      // 2. display
      for (var i = 0; i < responseLen; i++) {
        div = studentResults.appendChild(document.createElement("div"));
        div.innerHTML = response[i].firstName + " " + response[i].lastName;
        let studentId = response[i].id;
        div.addEventListener("click", function (e) {
          e.preventDefault();
          let includeId = studentsArr.includes(studentId);
          if (!includeId) {
            studentsArr.push(studentId);

            // for the input
            searchStudent.value = e.target.textContent;

            // div creation
            let studentNameDiv = document.querySelector("#displayStudent");
            let studentName = studentNameDiv.appendChild(
              document.createElement("div")
            );
            let studentNameLink = studentName.appendChild(
              document.createElement("a")
            );
            let studentNameSpan = studentName.appendChild(
              document.createElement("span")
            );
            studentNameLink.title = "Delete student";
            studentNameLink.href = "/";
            let studentNameIcon = studentNameLink.appendChild(
              document.createElement("i")
            );
            studentNameIcon.innerHTML =
              '<i class="fa fa-trash-o" aria-hidden="true"></i>';

            // to delete div in displayStudent div
            studentNameIcon.addEventListener("click", function (e) {
              e.preventDefault();

              var xhr = new XMLHttpRequest();
              xhr.open(
                "GET",
                `index.php?action=delAssignedStudent&courseID=${courseId}&studentId=${studentId}`
              );
              
              xhr.send();

              xhr.addEventListener("load", function () {
                if (xhr.status === 200) {
                  let parent = studentNameLink.parentElement;
                  parent.remove();
                }
              });
            });

            // adding styles to the divs
            studentNameDiv.classList.add("displayStudentsList");
            studentNameSpan.style.marginLeft = "10px";

            // to change the text of the div next to the input
            studentNameSpan.innerHTML += searchStudent.value + "\n";

            // to empty the input after
            searchStudent.value = "";
          }
        });

        document.body.addEventListener("click", () => {
          chooseResult(studentResults);
        });
      }
      
    }
  }
}

//////////////////////////////////////////////////////////////////////////
////////////////////////////EXECUTION////////////////////////////////////
////////////////////////////////////////////////////////////////////////

// 1. event listeners to enable enter, up, and down
searchTeacher.addEventListener("keyup", function (e) {
  var teacherDivs = teacherResults.querySelector("#teacherResults");

  // alert("im here"); i do enter into this event listener
  // means we cant go above the first div
  if (e.code == 38 && selectedResult > -1) {
    // If the key pressed is the up arrow and not above the top result div

    teacherDivs[selectedResult--].className = ""; // we move up and empty the class
    if (selectedResult > -1) {
      // this condition protect from a modification of childNodes[-1], which is not existing
      teacherDivs[selectedResult].className = "result_focus"; // we set the class
    }
  }

  // means we cant go below the last div
  else if (e.code == 40 && selectedResult < teacherDivs.length - 1) {
    // if the key pressed is the arrow bottom and not above the top result div
    alert("im here"); // why isnt this firing off???
    teacherResults.style.display = "block"; // We display the results
    if (selectedResult > -1) {
      // this condition protect from a modification of childNodes[-1], which is not existing
      teacherDivs[selectedResult].className = ""; // we empty the class
    }
    teacherDivs[++selectedResult].className = "result_focus"; //we move down and empty the class
    console.log(teacherDivs[selectedResult]);
  } else if (e.code == 13 && selectedResult > -1) {
    // if the key pressed is Enter
    chooseResult(teacherDivs[selectedResult]);
  } else {
    getUsers(searchTeacher.value, "1");
  }
});

// 1. event listeners to enable enter, up, and down
searchStudent.addEventListener("keyup", function (e) {
  var studentDivs = teacherResults.querySelector("#results");

  // alert("im here"); i do enter into this event listener
  // means we cant go above the first div
  if (e.code == 38 && selectedResult > -1) {
    // If the key pressed is the up arrow and not above the top result div

    studentDivs[selectedResult--].className = ""; // we move up and empty the class
    if (selectedResult > -1) {
      // this condition protect from a modification of childNodes[-1], which is not existing
      studentDivs[selectedResult].className = "result_focus"; // we set the class
    }
  }

  // means we cant go below the last div
  else if (e.code == 40 && selectedResult < studentDivs.length - 1) {
    // if the key pressed is the arrow bottom and not above the top result div
    alert("im here"); // why isnt this firing off???
    teacherResults.style.display = "block"; // We display the results
    if (selectedResult > -1) {
      // this condition protect from a modification of childNodes[-1], which is not existing
      studentDivs[selectedResult].className = ""; // we empty the class
    }
    studentDivs[++selectedResult].className = "result_focus"; //we move down and empty the class
    console.log(studentDivs[selectedResult]);
  } else if (e.code == 13 && selectedResult > -1) {
    // if the key pressed is Enter
    chooseResult(studentDivs[selectedResult]);
  } else {
    getUsers(searchStudent.value, "2");
  }
});

// form to assign course using courseID, teacher, student
let assignCourse = document.querySelector("#assignCourse");
assignCourse.addEventListener("click", function (e) {
  e.preventDefault();

  // the request
  var xhr = new XMLHttpRequest();
  teacher.textContent.trim();
  xhr.open(
    "GET",
    `index.php?action=assignCourses&courseID=${courseId}&teacher=${teacher.textContent}&students=${studentsArr}`
  );
    
  xhr.send();
});
