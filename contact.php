<?php
$title = "Contact";
require_once "./utils/utils.php";
$info=$firstName=$lastName=$email=$subject=$message="";
$firstNameError=$emailErr=$subjectError=$hayErrores=false;
$errores=[];
if("POST" === $_SERVER["REQUEST_METHOD"]){
   $firstName=sanitizeInput(($_POST["firstname"]??""));
    $lastName=sanitizeInput(($_POST["lastName"]??""));
    $email=sanitizeInput(($_POST["email"]??""));
    $subject=sanitizeInput(($_POST["subject"]??""));
    $message=sanitizeInput(($_POST["message"]??""));
    if(empty($firstName)){
        $errores[] ="El nombre es obligatorio";
        $firstNameError =true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[]="Formato inválido de correo";
        $emailErr =true;
    }
    if(empty($subject)){
        $errores[] ="El asunto es obligatorio";
        $subjectError =true;
        
    }
    if (sizeOf($errores)>0) {
            $hayErrores=true;
    }
    if(!$hayErrores){
        $info="Mensaje insertado correctamente";
        $firstName=$lastName=$email=$subject=$message="";
    }else{
        $info = "Datos erróneos";
    }
}
include("./views/contact.view.php");

?>