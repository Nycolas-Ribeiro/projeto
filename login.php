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

    <form action="login-backend.php" method="POST">
        <h2>Entrar</h2>
        <span>Email</span>
        <input type="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>">
        <span>Senha</span>
        <input type="password" name="senha">
        <span></span>
        <button type="submit">Entrar</button>
    </form>
    <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    
    <div class="info">
        <?php
        if(isset($_SESSION['erro'])){
            echo('<p>'.$_SESSION['erro'].'</p>');
        }
        unset($_SESSION['erro']);
        unset($_SESSION['old']);
        ?>
    </div>

</body>
</html>
