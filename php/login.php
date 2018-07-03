<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../config.php';

$id = $_POST['id'];
$pw = $_POST['senha'];

try{
    $usuario = src\controllers\UsuarioController::login($id, $pw);
    if ($usuario) {
        $_SESSION['usuario'] = $usuario;
        unset($_SESSION['erro_login']);
        header('location:../view/emprestimos.php');
    } else {
        unset($_SESSION['usuario']);
        $_SESSION['erro_login'] = "Erro - Usuário ou senha inválidos";
        header('location:../index.php');
    }
} catch (Exception $ex) {
    unset($_SESSION['usuario']);
    $_SESSION['erro_login'] = "Erro - Ocorreu um erro no login";
    header("location: ../index.php");
}finally {
    exit();
}