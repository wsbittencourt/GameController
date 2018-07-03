<?php

require_once '../vendor/autoload.php';
require_once '../config.php';

function todosAmigos(){
    return src\controllers\UsuarioController::red();
}

