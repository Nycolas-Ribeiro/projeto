<?php

session_start();
include_once('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$_SESSION['old'] = $_POST;

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = $conexao->query($sql);

if( $resultado->num_rows > 0 ){
    $usuario = $resultado->fetch_assoc();
    if( password_verify($senha,$usuario['senha']) ){
        unset($_SESSION['old']);
        $_SESSION['id'] = $usuario['id'];
        header('Location:  index.php');
    }else{
        $_SESSION['erro'] = 'Senha incorreta.';
        header('Location:  login.php');
    }
}else{
    $_SESSION['erro'] = 'Email não encontrado.';
    header('Location:  login.php');
}

?>
