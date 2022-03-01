<?php
    include 'php.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
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
    <header>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-sm">
                <!-- logo -->
                <a class="logo" href="index.php">
                    <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal">
                </a>
                <!-- burguer button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#burguerMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- nav -->
                <div class="collapse navbar-collapse justify-content-sm-end" id="burguerMenu">   
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#activitats">Activitats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="competicions.php">Competicions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="competicions.xml">Comp</a>
                        </li>
                        <?php if (empty($_SESSION['usuari'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Entrar</a>
                        </li>
                        <?php } else {?>
                        <li class="nav-item">
                            <a class="nav-link" href="fitxa.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo ' ' .$_SESSION['nom'] . ' ' . $_SESSION['cognom'] ?></a>
                        </li>
                        <?php }?>
                        
                        <?php if (!empty($_SESSION['usuari'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="tancar.php">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>  
                        <?php }?>          
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main id="competicions_main">

    </main>
    <div class="container">
        <footer class="d-flex flex-wrap border-top">
            <p class="col-md-5 mb-0 text-muted">© 1<sup>er</sup> de DAM - Projecte 2</p>
            <a class="logo" href="index.php">
                <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal">
            </a>
            <ul class="nav col-md-5">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#activitats" class="nav-link px-2 text-muted">Activitats</a></li>
                <li class="nav-item"><a href="competicions.xml" class="nav-link px-2 text-muted">Competicions</a></li>
            </ul>
        </footer>
    </div>
    <script src="src/js/functions.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>