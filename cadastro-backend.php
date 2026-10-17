<?php

session_start();
include_once('conexao.php');

# PEGAR AS INFORMAÇÕES DO FORMULÁRIO
$nome = $_POST['nome'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$genero = $_POST['genero'];
$foto = $_POST['foto'];
$senha = $_POST['senha'];
$confsenha = $_POST['confsenha'];

$_SESSION['old'] = $_POST;

date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime($nascimento);
$limiteantigo = (new DateTime())->modify('-110 years');
$limitenovo = (new DateTime())->modify('-10 years');
$hoje = new DateTime();

$senhacripto = password_hash($senha,PASSWORD_DEFAULT);

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado_email = $conexao->query($sql);

# VALIDAR AS INFORMAÇÕES
$erros = [];

if( empty($nome) ){
    $erros[] = 'Nome não preenchido.';
}
if( empty($email) ){
    $erros[] = 'Email não preenchido.';
}
if( empty($nascimento) ){
    $erros[] = 'Data de nascimento não preenchida.';
}
if( empty($senha) ){
    $erros[] = 'Senha não preenchida.';
}
if( $senha != $confsenha ){
    $erros[] = 'Senhas não correspondem.';
}
if( strlen($senha) < 4 ){
    $erros[] = 'Senha muito pequena.';
}
if( strlen($nome) < 3 ){
    $erros[] = 'Nome muito pequeno.';
}
if( $resultado_email->num_rows > 0 ){
    $erros[] = 'Email já utilizado.';
}
if( $data > $hoje ){
    $erros[] = 'A data está no futuro.';
}else if( $data > $limitenovo ){
    $erros[] = 'Você não a idade mínima.';
}
if( $data < $limiteantigo ){
    $erros[] = 'Você ultrapassou a idade máxima.';
}

# SALVAR O CADASTRO

if( empty($erros) ){
    $sql = "INSERT INTO usuarios (nome, email, nascimento, genero, senha) 
            VALUES ('$nome','$email','$nascimento','$genero','$senhacripto')";
    $conexao->query($sql);
    unset($_SESSION['old']);
    header('Location: login.php');
}else{
    $_SESSION['erros'] = $erros;
    header('Location: cadastro.php');
}

?>
