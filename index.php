<?php
session_start();
include_once('conexao.php');
if( !(isset($_SESSION['id'])) ){
    header('Location: login.php'); 
}
$idusuario = $_SESSION['id'];
$sql = "SELECT * FROM usuarios WHERE id = '$idusuario'";
$retorno = $conexao->query($sql);
$usuario = $retorno->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <h1>olá <?= $usuario['nome']?></h1>
    <a href="">Desconectar</a>
    <br>
    <a href="postar.php">Fazer postagem</a>
</body>
</html>
