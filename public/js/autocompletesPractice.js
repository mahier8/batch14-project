// Global variables
var searchElement = document.querySelector('input[name="autosearch"]'), // we need to make sure we grab the correct input
results = document.getElementById('results'), 
selectedResult = -1; // allow to know which result is selected : -1 means "no selection"

function getTeachers(keywords) { // we pass keywords into the getTeachers function
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=autocompleteUsers&keywords=' + keywords); // no keywords here just load the file
    // 1. the url links to the autocompleteUsers case in the router, 
    // 2. the function autocompleteUsers is created in the controller, 
    // 3. adding the getUsersByRole function from the userManager object
    // 4. which is responsible for making our query
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            let teacherObj = JSON.parse(xhr.responseText); // we are working with a teacherObj now
            console.log(teacherObj);
            /*
            from this object you find the teachers matching the keywords
            once you have them you build the HTML for the list inside the autocomplete
            you need to store the informations 
            */

           // in the successful situation, we display the results, passing in the object
           displayResults(teacherObj);
        }
    });
    xhr.send(null);
}

// how we display the e.target from below
function chooseResult(result) {
    // try 4
    // searchElement.innerHTML = result.firstName + " " + result.lastName;
    results.style.display = "none"; 
    // we grab the div for the results (from the global variable) and set its style
    result.className = "" // we add an empty className to what we pass in
    selectedResult = -1; // call in the global variable
    searchElement.focus(); // the input will have a focus 

    // update the html teacher name in the 2 fields
    // we have to do another AJAX call somewhere here

    // try 1
    // searchElement.innerHTML = result.firstName + " " + result.lastName;

    // try 3
    // if (result.length) { // We do modify the results only if we have ones
    //     var resultLen = result.length;
    //     results.innerHTML = ''; // We clear the results
    //     for (var i = 0, div ; i < resultLen ; i++) {
    //             div = results.appendChild(document.createElement('div'));
    //             div.classList.add("searchResults");
    //             div.innerHTML = result[i].firstName + " " + result[i].lastName; // 2. I need to display both the firstName and lastName
    //             div.addEventListener('click', function(e) {
    //                 chooseResult(e.target); // i need this choose result function
    //                 // when I click on one of the divs created in the autocomplete
    //                 // it should show me the teacher i clicked on then laod up the details
    //         });
    //     }
    // }

    // try 2
    // var xhr = new XMLHttpRequest();
    // xhr.open('GET', ''); 
    // xhr.addEventListener('readystatechange', function() {
    //     if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
    //         // i need the response that gets passed in from below
    //         ///////////////
    //         searchElement.innerHTML = response[i].firstName + " " + response[i].lastName;
    //     }
    // });
    // xhr.send(null);
}

// step 3. 
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
                    chooseResult(e.target); // i need this choose result function
                    console.log(e.target);
                    // when I click on one of the divs created in the autocomplete
                    // it should show me the teacher i clicked on then load up the details
            });
        }
    }
}

//////////////////////////////////////////////////////////////////////////
////////////////////////////EXECUTION////////////////////////////////////
////////////////////////////////////////////////////////////////////////   

// to enable enter, up, and down
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

searchSubmit.addEventListener("submit", function(e) {
    if (e.keyCode == 13) {
        e.preventDefault();
    } else {
        e.preventDefault();
        getWeather(search.value);
        emptyInnerHTML();
        emptyAutoResults();
        search.value = "";
    }
})