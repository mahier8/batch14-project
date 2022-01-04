
<?php 

//Prevents SQL injections by escaping the HTML tags and characters
function pageSecurity($loginData){
   $data = htmlspecialchars($loginData);
   $data = htmlentities($loginData);
   $data = trim($loginData);
   $data = strip_tags($loginData);
   return $data;
}
?>