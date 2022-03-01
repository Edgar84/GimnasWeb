<?php
    include 'php.php';
    session_start();

    $_SESSION['error'] = '';
    iniciarSessio();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/img/logoX_transparent.png" type="image/icon type">
    <title>Top Gym</title>
    <link rel="stylesheet" href="src/css/reset.css"/>
    <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css"/>
    <link rel="stylesheet" href="src/css/fontawesome/all.min.css"/>
    <link rel="stylesheet" href="src/css/style.css"/>
</head>
<body>
    <main class="login-main">
        <form method="POST">
            <a class="logo" href="index.php">
                <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal">
            </a>
            <?php if (isset($_POST['submit'])) {?>
                <p class="login-error"><?php echo $_SESSION['error']?></p>
            <?php }?>
            <div class="form-group">
                <!--<label for="usuari">Usuari</label>-->
                <label for="usuari"><i class="fas fa-user"></i></label>
                <input type="text" class="form-control" id="usuari" name="usuari" required="required">
            </div>
            <div class="form-group">
                    <!--<label for="password">Password</label>-->
                <label for="password"><i class="fas fa-key"></i></label>
                <input type="password" class="form-control" id="password" name="password" required="required">
            </div>
            <input type="submit" class="btn btn-success" name="submit" value="Entrar">
        </form>
    </main>

    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>