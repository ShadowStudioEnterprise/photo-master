<?php

require_once __DIR__ . '/../entity/Asociado.php';

require_once __DIR__ . '/../database/QueryBuilder.php';

class AsocicadoRepository extends QueryBuilder

{

    public function __construct(){

        parent::__construct('asociado', 'Asociado');

    }
}