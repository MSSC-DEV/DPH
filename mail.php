<?php
//if "ok" variable is filled out, send email
  if (isset($_REQUEST['ok']))  {
  
  //Email information
  $admin_to = "info@flacademy.cd";
  $name = $_REQUEST['name'];
  $form= $_REQUEST['email'];
  $comment = $_REQUEST['comment'];
  
  //send email
  mail($admin_to, $name, $comment, "From:" . $form);
  
  //Email response
 header("location: index.php");
  }
 ?>