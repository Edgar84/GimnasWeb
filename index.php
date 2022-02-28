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
                            <a class="nav-link" href="competicions.xml">Competicions</a>
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
    <main>
        <!-- Slider -->
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="src/img/slider-1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="src/img/slider-2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="src/img/slider-3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Content -->
        <div class="container" id="activitats">
            <!-- Activitats lliures -->
            <div class="home-title">
                <h2>Activitats lliures</h2>
            </div>
            <section class="row card-section">
            <?php $result = infoActivitatsLliures(); while ($row = $result->fetch_assoc()) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card" >
                        <figure>
                            <img src="src/img/x.png" class="card-img-top " alt="...">
                            <span class="color-x"></span>
                        </figure>
                        <div class="card-body">
                            <h2 class="h4"><?php echo $row['activitat']?></h2>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span><?php echo $row['hora'] . 'h'?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Aforamemt:</span><span><?php echo $row['aforament_max']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Monitor:</span><span><?php echo $row['nom'] . ' ' . $row['cognom']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Sala:</span><span><?php echo $row['num']?></span></p>
                            <button class="btn btn-primary" type="button">
                                Reservar
                            </button>
                        </div>
                      </div>
                </div>
            <?php }?>
            </section>
            <!-- Activitats col·lectives -->
            <div class="home-title">
                <h2>Activitats col·lectives</h2>
            </div>
            <section class="row card-section">
            <?php $result = infoActivitatsColectives(); while ($row = $result->fetch_assoc()) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card" >
                    <figure>
                            <img src="src/img/x.png" class="card-img-top " alt="...">
                            <span class="color-x"></span>
                        </figure>
                        <div class="card-body">
                            <h2 class="h4"><?php echo $row['activitat']?></h2>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span><?php echo $row['hora'] . 'h'?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Aforamemt:</span><span><?php echo $row['aforament_max']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Monitor:</span><span><?php echo $row['nom'] . ' ' . $row['cognom']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Sala:</span><span><?php echo $row['num']?></span></p>
                            <button class="btn btn-primary" type="button">
                                Reservar
                            </button>
                        </div>
                      </div>
                </div>
            <?php }?>
            </section>
        </div>
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