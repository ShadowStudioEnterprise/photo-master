<?php
$title = "Home";
require_once "./utils/utils.php";
require_once "./entity/ImagenGaleria.php";
$galeria[]=new ImagenGaleria("1.jpg","descripcion imagen 1", 1,3, 69);
$galeria[]=new ImagenGaleria("2.jpg","descripcion imagen 2", 1,3, 13);
$galeria[]=new ImagenGaleria("3.jpg","descripcion imagen 3", 1,3, 23);
$galeria[]=new ImagenGaleria("4.jpg","descripcion imagen 4", 1,3, 29);
$galeria[]=new ImagenGaleria("5.jpg","descripcion imagen 5", 1,3, 36);
$galeria[]=new ImagenGaleria("6.jpg","descripcion imagen 6", 1,3, 100);
$galeria[]=new ImagenGaleria("7.jpg","descripcion imagen 7", 1,3, 60);
$galeria[]=new ImagenGaleria("8.jpg","descripcion imagen 8", 1,3, 30);
$galeria[]=new ImagenGaleria("9.jpg","descripcion imagen 9", 1,3, 14);
$galeria[]=new ImagenGaleria("10.jpg","descripcion imagen 10", 1,3, 100);
$galeria[]=new ImagenGaleria("11.jpg","descripcion imagen 11", 1,3, 1);
$galeria[]=new ImagenGaleria("12.jpg","descripcion imagen 12", 1,3, 15);
include("./views/index.view.php");
?>