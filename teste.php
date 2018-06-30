<?php

require_once 'config.php';

$consulta = \src\models\Usuario::all();

print_r($consulta);

