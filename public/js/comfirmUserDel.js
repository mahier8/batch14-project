
let comfirmDel = document.querySelectorAll('.delete');
console.log(comfirmDel)

    for(let i = 0; i <  comfirmDel.length ; i++){
         comfirmDel[i].addEventListener('click', function(e){
           let yesOrno = confirm('Are Sure You want to Delete?');
           if(yesOrno){
               return true;
           }else{
               e.preventDefault();
           }

        });
    }
  





