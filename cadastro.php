<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="cadastro-backend.php" method="POST">
        <h2>Criar conta</h2>
        <span>Nome</span>
        <input type="text" name="nome" value="<?= $_SESSION['old']['nome'] ?? '' ?>">
        <span>Email</span>
        <input type="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>">
        <span>Data de nascimento</span>
        <input type="date" name="nascimento" value="<?= $_SESSION['old']['nascimento'] ?? '' ?>">
        <span>Gênero</span>
        <select name="genero" id="">
            <option>Não informado</option>
            <option>Masculino</option>
            <option>Feminino</option>
            <option>Outro</option>
        </select>
        <span>Foto</span>
        <input type="file" name="foto" value="<?= $_SESSION['old']['foto'] ?? '' ?>">
        <span>Senha</span>
        <input type="password" name="senha" value="<?= $_SESSION['old']['senha'] ?? '' ?>">
        <span>Confirmar senha</span>
        <input type="password" name="confsenha">
        <span></span>
        <button type="submit">Criar</button>
    </form>
    <p>Já tem uma conta? <a href="login.php">Entrar</a></p>

    <div class="info">
        <?php
        if(isset($_SESSION['erros'])){
            foreach($_SESSION['erros'] as $erro){
                echo('<p>'.$erro.'</p>');
            }
        }
        unset($_SESSION['erros']);
        unset($_SESSION['old']);
        ?>
    </div>

</body>
</html>
