
    <h1><?= $user['firstName'] . " " . $user['lastName'];?></h1>
    

document.getElementById('demo').innerHTML=document.cookie;
// addEventListener('click' ,()=>{
//     history.forward()
// })





// // const inputobj = {
// //     passwords : document.querySelectorAll("input[type='password']"),
// //     changePasswordBtn : document.querySelector(".changePass"),
// //     submitPasswordBtn : document.querySelector("#button"),
// //     div : document.querySelector("#inputNone"),
// //     id : document.querySelector("#hidden")

// // };

// inputobj.changePasswordBtn.addEventListener('click', () => {
//     inputobj.div.style.display = 'block';
//     inputobj.changePasswordBtn.style.display = 'none';
//     inputobj.submitPasswordBtn.style.display='block';
  
// });

// var id,  updateValue, oldPassword;
// inputobj.submitPasswordBtn.addEventListener('click', () => {
 
//         if(inputobj.passwords[0].value === '' || inputobj.passwords[1].value === '' || inputobj.passwords[2].value === '') {
        
//             document.getElementById('error').textContent = 'Field cannot be empty!! ';
//             return false;
       
//         }

//         if(inputobj.passwords[1].value == inputobj.passwords[2].value){
//             updateValue = inputobj.passwords[1].value;
//             id = inputobj.id.getAttribute('value');
//             // oldPassword = inputobj.passwords[0].value;
//             const xhr = new XMLHttpRequest();
//             console.log(id );
//             console.log(updateValue);
//             console.log( oldPassword);
//             xhr.open('GET', `index.php?action=setId&id=${id}&value=${updateValue}`);

//             xhr.onreadystatechange = function(){
//                 if(xhr.readyState == 4){
//                     if(xhr.status ==200){
//                         console.log(xhr.status)
//                     }else{
//                         console.warn('no')
//                     }
//                 }
//             }
//             xhr.send(null)
//             inputobj.changePasswordBtn.style.display = 'block';
//             inputobj.submitPasswordBtn.style.display='none';
//             inputobj.div.style.display = 'none';
//             document.querySelector('.success').style.display='block'
//             // document.querySelector('.success').textContent = 'Password Updated' 
//             document.getElementById('error').textContent = ""; 
      
//         }else{
//             document.getElementById('error').textContent = "Password not match!"; 
//             return false;
//         }
  
// });