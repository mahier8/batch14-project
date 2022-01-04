// max date is today
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd;
}

if (mm < 10) {
    mm = '0' + mm;
} 

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").setAttribute("max", today);

//suggested password
function genPassword() {
    var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var passwordLength = 12;
    var password = "";
    for (var i = 0; i <= passwordLength; i++) {
        var randomNumber = Math.floor(Math.random() * chars.length);
        password += chars.substring(randomNumber, randomNumber +1);
    }
    document.getElementById("suggestedPwd").value = password;
}

//copies suggested password to password input
function copyPassword() {
    var copyText = document.getElementById("suggestedPwd");
    console.log(copyText);
    copyText.select();
    copyText.setSelectionRange(0, 999);
    document.execCommand("copy");
    document.getElementById("passwordInput").value = copyText.value;
    document.getElementById("passwordInput").focus();
}

//checks password strength
var passwordMeter = document.getElementById('passwordMeter');
var mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');
var strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})');
 
function StrengthChecker(PasswordParameter){
    if(strongPassword.test(PasswordParameter)) {
        passwordMeter.style.backgroundColor = "green";
        passwordMeter.textContent = 'Strong';
    } else if(mediumPassword.test(PasswordParameter)){
        passwordMeter.style.backgroundColor = 'blue';
        passwordMeter.textContent = 'Medium';
    } else{
        passwordMeter.style.backgroundColor = 'red';
        passwordMeter.textContent = 'Weak';
    }
}

//password meter display with event listeners
var timeout;
var password = document.getElementById('passwordInput');

['keyup','focus'].forEach( evt => password.addEventListener(evt, ()=> { 
    passwordMeter.style.display= 'block'; //password meter is hidden by default
    clearTimeout(timeout);
    //call StrengthChecker as a callback then pass the typed password
    timeout = setTimeout(() => StrengthChecker(password.value), 500); 

    if(password.value.length !== 0){ //if user clears text, password meter is hidden again
        passwordMeter.style.display != 'block';
    } else{
        passwordMeter.style.display = 'none';
    }
}));