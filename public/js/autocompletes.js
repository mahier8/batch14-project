// Global variables
var searchElement = document.querySelector('input[name="autosearch"]'), // we need to make sure we grab the correct input
results = document.getElementById('results'), // where we display the div dropdowns
selectedResult = -1; // allow to know which result is selected : -1 means "no selection"

// 2. function to search through the data for what i want
function getTeachers(keywords) { // we pass keywords into the getTeachers function
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=autocompleteUsers&keywords=' + keywords); // no keywords here just load the file
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            let teacherObj = JSON.parse(xhr.responseText); // we are working with a teacherObj now
            console.log(teacherObj);
           displayResults(teacherObj);
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
function displayResults(response) { // Display the results of a request
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
                    
                    // if I click outside of the display of results, the the results div should display 
                
                    // if (e.target != !results) {
                    //     console.log("clciked outside");
                    //     results.style.display = "none"; 
                    // }

                    // chooseResult(results.querySelector('#results'));
            });

            document.body.addEventListener('click',()=>{
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

    if (e.code == 38 && selectedResult > -1) { // If the key pressed is the up arrow
        divs[selectedResult--].className = '';
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            divs[selectedResult].className = 'result_focus';
        }
    }

    else if (e.code == 40 && selectedResult < divs.length - 1) { // if the key pressed is arrow bottom
        results.style.display = 'block'; // We display the results
        if (selectedResult > -1) { // this condition protect from a modification of childNodes[-1], which is not existing
            divs[selectedResult].className = '';
        }
        divs[++selectedResult].className = 'result_focus';
    }
    else if (e.code == 13 && selectedResult > -1) { // if the key pressed is Enter
        chooseResult(divs[selectedResult]);
    }else {
        getTeachers(searchElement.value);
    }
});



// searchElement.addEventListener("submit", function(e) {
//     if (e.keyCode == 13) {
//         e.preventDefault();
//     } else {
//         console.log(searchElement.value);
//     }
// })