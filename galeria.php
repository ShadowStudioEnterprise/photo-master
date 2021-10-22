<?php
$title = "Galeria";
require_once "./utils/utils.php";
$info=$description=$urlImagen="";
$descriptionError=$imagenErr=$hayErrores=false;
$errores=[];
if("POST" === $_SERVER["REQUEST_METHOD"]){
    if(empty($_POST)){
        $errores[] ="Se ha producido un error al procesar el formulario";
        $imagenErr =true;
    }
    if (!$imagenErr) {
        $description=sanitizeInput(($_POST["description"]??""));
        $emailErr =true;
    
    if(empty($description)){
        $errores[] ="La descripción es obligatoria";
        $descriptionError =true;
    }
    }
    if (isset($_FILES["iamgen"])&&($_FILES['imagen']['error'])==UPLOAD_ERR_OK) {
        if ($_FILES['imagen']['size'>(2*1024*1024)]) {
            $errores[] ="El archivo no puedo superar los 2MB";
            $imagenErr =true;
        }
        $extensions=array("image/jpeg","imagen/jpg","image/png");
        if(false===in_array($_FILES['imagen']['type'],$extensions)){
            $errores[]="Extensión no permitida, solo son válidos jpg o png";
            $imagenErr=true;
        }

        if($imagenErr){
            if(false===move_uploaded_file($_FILES['imagen']['tmp_name'],"images/index/gallery".$_FILES['imagen']['name'])){
                $errores[]="Se ha producido un error al mover la imagen";
                $imagenErr=true;
            } 
        }
    }else{
        $errores[]="Se ha producido un error. Código de error".$_FILES['imagen']['error'];
        $imagenErr=true;
    }
    if (sizeOf($errores)>0) {
        $hayErrores=true;
}
    if(!$hayErrores){
        $info="Imagen enviada correctamente";
        $urlImagen="images/index/gallery/".$_FILES['imagen']['name'];
        $description="";
    }else{
        $info = "Datos erróneos";
    }
}
include("./views/galeria.view.php");

?>