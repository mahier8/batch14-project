// //~~~~~~~~~~~~~~~~~~~~~ USER PROFILE PASSWORD ~~~~~~~~~~~~~~~~~~~~~


const input = {
    inputDiv : document.getElementById('inputNone'),
    oldPassword : document.getElementById('oldPassword'),                 
    newPassword : document.getElementById('newPassword'),
    rePassword : document.getElementById('rePassword'),
    changeButton : document.getElementById('changeButton'),
    submitButton : document.getElementById('submitButton'),
    error : document.getElementById('error')
};

const hide = document.getElementById('subHide');

hide.addEventListener('click', function(e){
    input.inputDiv.style.display='none';
    e.target.style.display='flex';
    input.submitButton.style.display='none';
    input.changeButton.style.display='flex';
})

input.changeButton.addEventListener('click', function(e){
    input.inputDiv.style.display='flex';
    e.target.style.display='none';
    input.submitButton.style.display='flex';
});

input.submitButton.addEventListener('click', function(e){
    let oldPassword = input.oldPassword.value;
    let newPassword = input.newPassword.value;
    let rePassword = input.rePassword.value;

    if(oldPassword ==='' || newPassword ==='' || rePassword ===''){
      e.preventDefault();
        input.error.innerHTML="Password must be filled out!";
        
    }else if(newPassword != rePassword){
        e.preventDefault();
        input.error.innerHTML="Password Comfirm not match!";
        
    }else{
        input.inputDiv.style.display='none';
        e.target.display='none'; 
        input.changeButton.style.display='block';
        oldPassword ='';
        newPassword ='';
        rePassword ='';
        input.success.textContent='Thanks, Password Updated.';
    }

  

    
 });


