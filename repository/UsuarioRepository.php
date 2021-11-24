<?php

require_once __DIR__ . '/../entity/Mensaje.php';

require_once __DIR__ . '/../database/QueryBuilder.php';

class UsuarioRepository extends QueryBuilder

{

    public function __construct(){

        parent::__construct('usario', 'Usuario');

    }
}