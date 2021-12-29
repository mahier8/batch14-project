
<?php 

function pageSecurity($loginData){
   $data = htmlspecialchars($loginData);
   $data = htmlentities($loginData);
   $data = trim($loginData);
   $data = strip_tags($loginData);
   return $data;

}
?>