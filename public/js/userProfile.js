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
const showUpload = document.getElementById('picButton');
const uploadDiv = document.getElementById('uploadDiv');
const uploadHide = document.getElementById('uploadHide')
const wrapper = document.getElementById('wrapper');

showUpload.addEventListener('click', function(e){
    uploadDiv.style.display='flex';
    uploadHide.style.display='flex';
    uploadDiv.setAttribute('class', 'centerDiv');
    e.target.style.display='none';
    wrapper.scrollTo(500, 294);
});


uploadHide.addEventListener('click', function(e){
    uploadDiv.style.display='none';
    e.target.style.display='none';
    showUpload.style.display='flex';
})

hide.addEventListener('click', function(e){
    input.inputDiv.style.display='none';
    e.target.style.display='flex';
    input.submitButton.style.display='none';
    input.changeButton.style.display='flex';
})

input.changeButton.addEventListener('click', function(e){
    input.inputDiv.style.display='flex';
    input.inputDiv.style.justifyContent='center';
    input.inputDiv.style.alignItems='center';
    e.target.style.display='none';
    input.submitButton.style.display='flex';
    wrapper.scrollTo(500, 294);
});

input.submitButton.addEventListener('click', function(e){
    let oldPassword = input.oldPassword.value;
    let newPassword = input.newPassword.value;
    let rePassword = input.rePassword.value;

    if(oldPassword ==='' || newPassword ==='' || rePassword ===''){
      e.preventDefault();
        alert("Password must be filled out!")
        // input.error.innerHTML="Password must be filled out!";
        
    }else if(newPassword != rePassword){
        e.preventDefault();
        alert("Password does not match confirmation!")
        // input.error.innerHTML="Password does not match confirmation!";
        
    }else{
        input.inputDiv.style.display='none';
        e.target.display='none'; 
        input.changeButton.style.display='block';
        oldPassword ='';
        newPassword ='';
        rePassword ='';
        alert('Password Updated Successfully')
        // input.success.textContent='Thanks, Password Updated.';
    }

  

    
 });


