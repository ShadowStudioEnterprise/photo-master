<?php
$title = "Asociado";
require_once "./entity/Asociado.php";
require_once "./utils/File.php";
require_once "./exceptions/FileException.php";
require_once "./utils/SimpleImage.php";
$info=$nombre=$description=$urlLogo="";
$nombreError=$imagenErr=$hayErrores=false;
$errores=[];
if("POST" === $_SERVER["REQUEST_METHOD"]){
    try{
        if(empty($_POST)){
            throw new Exception("Se ha producido un error al procesar el formulario");
        }
        $imageFile = new File("imagen",array("image/jpeg","image/jpg","image/png"),(2*1024*1024));
        $imageFile->saveUploadedFile(asociado::RUTA_IMAGENES_LOGO);
        try {
        // Create a new SimpleImage object
        $simpleImage = new \claviska\SimpleImage();
    $simpleImage
        ->fromFile(asociado::RUTA_IMAGENES_LOGO . $imageFile->getFileName())
        ->resize(50, 50)
        ->toFile(asociado::RUTA_IMAGENES_LOGO . $imageFile->getFileName());
        
    }catch(Exception $err) {
        $errores[]= $err->getMessage();
        $imagenErr = true;
    }
    }catch(FileException $fe){
        $errores[]=$fe->getMessage();
        $imagenErr=true;
    }
    $nombre=sanitizeInput(($_POST["nombre"]??""));
    $description=sanitizeInput(($_POST["description"]??""));
    if(empty($nombre)){
        $errores[] ="El nombre esta vacio";
        $nombreError =true;
    }
    if(0==count($errores)){
        $info="Logo subido correctamente:";
        $urlLogo=Asociado::RUTA_IMAGENES_LOGO.$imageFile->getFileName();
        $description="";
    }else{
        $info = "Datos erróneos";
    }
}

include("./views/asociado.view.php");

?>