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
    <title>Fitxa - Top Gim</title>
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
                            <a class="nav-link" href="index.php">Activitats</a>
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
    <main id="reserves">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Reserves</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="home-title">
                        <h2>Reserves pendents</h2>
                    </div>
                </div>
                <?php $result = obtenirReservesLliuresPendents(); while ($row = $result->fetch_assoc()) { ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card" >
                        <figure>
                            <img src="src/img/x.png" class="card-img-top " alt="...">
                            <span class=<?php echo $row['color']?>></span>
                        </figure>
                        <div class="card-body">
                            <h2 class="h4"><?php echo $row['activitat']?></h2>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span><?php echo $row['hora'] . 'h'?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Monitor:</span><span><?php echo $row['nom'] . ' ' . $row['cognom']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Aforamemt:</span><span><?php echo $row['aforament_max']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Sala:</span><span><?php echo $row['num']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Tipus:</span><span class="lliures">Lliure</span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Dia:</span><span class="dia_act"><?php echo $row['data']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span class="hora_act"><?php echo $row['hora'] . 'h'?></span></p>
                            <button class="btn btn-warning" type="button" id="<?php echo $row['id']?>">
                                Anular
                            </button>
                        </div>
                      </div>
                </div>
                <?php }?>
                <?php $result = obtenirReservesColectivesPendents(); while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-12 col-sm-6 col-md-3">
                    <div class="card" >
                        <figure>
                            <img src="src/img/x.png" class="card-img-top " alt="...">
                            <span class=<?php echo $row['color']?>></span>
                        </figure>
                        <div class="card-body">
                            <h2 class="h4"><?php echo $row['activitat']?></h2>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span><?php echo $row['hora'] . 'h'?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Monitor:</span><span><?php echo $row['nom'] . ' ' . $row['cognom']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Aforamemt:</span><span><?php echo $row['aforament_max']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Sala:</span><span><?php echo $row['num']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Tipus:</span><span class="colectives">Col??lectiva</span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Dia:</span><span class="dia_act"><?php echo $row['data']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span class="hora_act"><?php echo $row['hora'] . 'h'?></span></p>
                            <button class="btn btn-warning" type="button" id="<?php echo $row['id']?>">
                                Anular
                            </button>
                        </div>
                      </div>
                </div>
                <?php }?>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="home-title">
                        <h2>Reserves finalitzades</h2>
                    </div>
                </div>
                <?php $result = obtenirReservesLliuresFinalitzades(); while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-12 col-sm-6 col-md-3">
                    <div class="card" >
                        <figure>
                            <img src="src/img/x.png" class="card-img-top " alt="...">
                            <span class=<?php echo $row['color']?>></span>
                        </figure>
                        <div class="card-body">
                            <h2 class="h4"><?php echo $row['activitat']?></h2>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span><?php echo $row['hora'] . 'h'?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Tipus:</span><span>Col??lectiva</span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Aforamemt:</span><span><?php echo $row['aforament_max']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Monitor:</span><span><?php echo $row['nom'] . ' ' . $row['cognom']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Sala:</span><span><?php echo $row['num']?></span></p>
                        </div>
                      </div>
                </div>
                <?php }?>
                <?php $result = obtenirReservesColectivesFinalitzades(); while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-12 col-sm-6 col-md-3">
                    <div class="card" >
                        <figure>
                            <img src="src/img/x.png" class="card-img-top " alt="...">
                            <span class=<?php echo $row['color']?>></span>
                        </figure>
                        <div class="card-body">
                            <h2 class="h4"><?php echo $row['activitat']?></h2>
                            <p class="card-text"><span class="text-muted text-size-sm">Hora d'inici:</span><span><?php echo $row['hora'] . 'h'?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Tipus:</span><span>Col??lectiva</span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Aforamemt:</span><span><?php echo $row['aforament_max']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Monitor:</span><span><?php echo $row['nom'] . ' ' . $row['cognom']?></span></p>
                            <p class="card-text"><span class="text-muted text-size-sm">Sala:</span><span><?php echo $row['num']?></span></p>
                        </div>
                      </div>
                </div>
                <?php }?>
            </div>
        </div>
    </main>
    <div class="container">
        <footer class="d-flex flex-wrap border-top">
            <p class="col-md-5 mb-0 text-muted">?? 1<sup>er</sup> de DAM - Projecte 2</p>
            <a class="logo" href="index.html">
                <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal">
            </a>
            <ul class="nav col-md-5">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Activitats</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Competicions</a></li>
            </ul>
        </footer>
    </div>
    <script src="src/js/functions.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>