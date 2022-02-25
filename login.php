<?php
    include 'php.php';
    session_start();
    // sessioJaIniciada();

    $_SESSION['error'] = '';
    iniciarSessio();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estils.css">
    <title>Document</title>
</head>
<body>
<h2>Formulari de Login</h2>

<p id="error"> <?php echo $_SESSION['error']?> </p>

<form method="POST">
    <input type="text" name="usuari" id="usuari" placeholder="Nom d'usuari" required="required" />
    <input type="password" name="password" id="password" placeholder="Contrasenya" required="required" />
    <input name="submit" type="submit" value="Login">
</form>

</body>
</html>

<!-- https://www.youtube.com/watch?v=rGS8t9BSGO4 -->