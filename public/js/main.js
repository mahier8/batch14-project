// main js
const tbobj = {
    input : document.querySelector(".filter") ,
    tr    :document.querySelectorAll("tr"), 
}
var td, i, tr, textValue,notfound;

tbobj.input.addEventListener("keyup", function(e){
    
    var filter = e.target.value.toLowerCase(); 
    tr = tbobj.tr;
    for(i = 0; i < tr.length; i++){
       
        td = tr[i].getElementsByTagName('td')[3];

        if(td){
            textValue = td.textContent || td.innerText;
            if(notfound =textValue.toLocaleLowerCase().indexOf(filter, 0) > -1){
             
                tr[i].style.display="";
              
            }else{

                tr[i].style.display="none";
              
            }
          
           
        }
    
      
}

});







