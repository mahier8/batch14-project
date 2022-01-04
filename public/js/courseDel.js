let courseDel = document.querySelectorAll('.courseDel');


    for(let i = 0; i <  courseDel.length ; i++){
         courseDel[i].addEventListener('click', function(e){
           let yesOrno = confirm('Are Sure You want to Delete Course?');
           if(yesOrno){
               return true;
           }else{
               e.preventDefault();
           }

        });
    }
  