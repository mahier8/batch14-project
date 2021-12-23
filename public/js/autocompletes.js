// Global variables
var searchElement = document.querySelector('input[name="autosearch"]'), 
searchStudent = document.querySelector('input[name="studentAutosearch"]'), 
// we need to make sure we grab the correct input

results = document.getElementById('results'), // where we display the div dropdowns
studentResults = document.getElementById('studentResults'),

selectedResult = -1; // allow to know which result is selected : -1 means "no selection"

// I should add in the parameter role, add role to my url, change the 
// 2. function to search through the data for what i want
function getUsers(keywords, role) { // we pass keywords into the getTeachers function
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=autocompleteUsers&keywords=' + keywords + '&role=' + role); // no keywords here just load the file
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            let userObj = JSON.parse(xhr.responseText); // we are working with a teacherObj now
            console.log(userObj);
           displayResults(userObj, role);
        }
    });
    xhr.send(null);
}

// 4. function to choose and display the e.target from below
function chooseResult(result) {
    // e.preventDefault();
    results.style.display = "none"; 
    // we grab the div for the results (from the global variable) and set its style
    result.className = "" // we add an empty className to what we pass in
    selectedResult = -1; // call in the global variable
    searchElement.focus(); // the input will have a focus 
}

// 3. function to display the results of the above AJAX request in dropdown divs
function displayResults(response, role) { // Display the results of a request

    if (role == '1')  {

    } else {

    }



    console.log(response);
    results.style.display = response.length ? 'block' : 'none'; // We hide the container if we don't have results
    if (response.length) { // We do modify the results only if we have ones
        var responseLen = response.length;
        results.innerHTML = ''; // We clear the results
        for (var i = 0, div ; i < responseLen ; i++) {
                div = results.appendChild(document.createElement('div'));
                div.classList.add("searchResults");
                div.innerHTML = response[i].firstName + " " + response[i].lastName; // 2. I need to display both the firstName and lastName
                div.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log(e.target);

                    searchElement.value = e.target.textContent;
                    // chooseResult(e.target); // i need this choose result function
                    let teacherNameDiv = document.querySelector("#displayTeacher");
                    console.log(teacherNameDiv);
                    teacherNameDiv.innerHTML = searchElement.value; // to change the text of the div next to the input
                    let teacherNameHeader = document.querySelector("#displayTeacherHeader");
                    console.log(teacherNameHeader);
                    teacherNameHeader.innerHTML = searchElement.value; // to change the text of the header above the input

                    // chooseResult(results.querySelector('#results'));
            });
            document.body.addEventListener('click',() =>{
                chooseResult(results)
            })
        }
    }
}


//////////////////////////////////////////////////////////////////////////
////////////////////////////EXECUTION////////////////////////////////////
////////////////////////////////////////////////////////////////////////   

// 1. event listeners to enable enter, up, and down
searchElement.addEventListener('keyup', function(e) {
    var divs = results.querySelector('#results');

    // alert("im here"); i do enter into this event listener
    // means we cant go above the first div
    if (e.code == 38 && selectedResult > -1) { // If the key pressed is the up arrow and not above the top result div
        
        divs[selectedResult--].className = ''; // we move up and empty the class
        console.log(selectedResult);
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            divs[selectedResult].className = 'result_focus'; // we set the class
        }
    }

    // means we cant go below the last div
    else if (e.code == 40 && selectedResult < divs.length - 1) { // if the key pressed is the arrow bottom and not above the top result div
        alert("im here"); // why isnt this firing off???
        results.style.display = 'block'; // We display the results
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            divs[selectedResult].className = ''; // we empty the class
        }
        divs[++selectedResult].className = 'result_focus';//we move down and empty the class
        console.log(divs[selectedResult]);
    }
    else if (e.code == 13 && selectedResult > -1) { // if the key pressed is Enter
        chooseResult(divs[selectedResult]);
    }else {
        getUsers(searchElement.value);
    }
});

// searchElement.addEventListener("submit", function(e) {
//     if (e.keyCode == 13) {
//         e.preventDefault();
//     } else {
//         console.log(searchElement.value);
//     }
// })