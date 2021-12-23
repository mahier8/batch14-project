//~~~~~~~~~~~~~~~~~~~~~ USER PROFILE PASSWORD ~~~~~~~~~~~~~~~~~~~~~


const inputobj = {
    passwords : document.querySelectorAll("input[type='password']"),
    changePasswordBtn : document.querySelector(".changePass"),
    submitPasswordBtn : document.querySelector("#button"),
    div : document.querySelector("#inputNone"),
    id : document.querySelector("#hidden"),
    dbPassword : document.querySelector("#dbPassword"),
    oldPassSession : document.querySelector("#oldPass")

};

console.log('dbpass'+inputobj.changePasswordBtn)
console.log('old'+inputobj.oldPassSession.getAttribute('value'))

inputobj.changePasswordBtn.addEventListener('click', () => {
    console.log('kkkk')
    inputobj.div.style.display = 'block';
    // inputobj.ChangePasswordBtn.style.display = 'none';
    // inputobj.submitPasswordBtn.style.display='block';
  
});

var inputLen, falsyValue, empty, id,  updateValue, oldPassword;
inputobj.submitPasswordBtn.addEventListener('click', () => {
    inputLen = inputobj.passwords.length;
    for(let i = 0; i < inputLen; i++) {
        falsyValue = inputobj.passwords[i].value;
        oldPassword = inputobj.passwords[0].value;
        // console.log(inputobj.dbPassword.value)
      
        if(!falsyValue) {
            falsyValue="";
            empty = falsyValue || 'Field cannot be empty!! ';
            document.getElementById('error').textContent = empty 
            return false;
        }

        // if(inputobj.dbPassword.getAttribute('value') != inputobj.oldPassSession.getAttribute('value')){
        //     document.getElementById('error').textContent = "Does not match oldPassword!"; 
        //     return false;
        // }

        if(inputobj.passwords[1].value == inputobj.passwords[2].value){
            updateValue = inputobj.passwords[1].value;
            id = inputobj.id.getAttribute('value');
            const req = new XMLHttpRequest();
            req.open('GET', `index.php?action=setId&id=${id}&value=${updateValue}&oldPass=${oldPassword}`);
            req.send(null)
            inputobj.changePasswordBtn.style.display = 'block';
            inputobj.submitPasswordBtn.style.display='none';
            inputobj.div.style.display = 'none';
            document.querySelector('.success').style.display='block'
            document.querySelector('.success').textContent = 'Password Updated' 
      
        }else{
            document.getElementById('error').textContent = "Password not match!"; 
        }
  

    }
});
