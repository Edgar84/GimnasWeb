<?php
    include 'php.php';
    session_start();
    $success = '';
    modificarDadesClient();
    obtenirDadesUsuari();
    
?>
<!DOCTYPE html>
<html lang="en">
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
                            <a class="nav-link" href="index.php#activitats">Activitats</a>
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
                            <a class="nav-link" href="fitxa.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo ' ' . $_SESSION['nom'] . ' ' . $_SESSION['cognom'] ?></a>
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
    <main id="areaPersonal">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Area personal</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="reserves">
                        <a href="reserves.php" class="btn btn-info"><i class="far fa-calendar-alt"></i> &nbsp;Les meves reserves</a>
                    </div>
                </div>
            </div>
            <form method="POST" class="personal_area">

                <h2>Dades personals</h2>
                <?php if (isset($_POST['submit'])) {?>
                    <p class="login-error"><?php echo $_SESSION['error']; $_SESSION['error'] = '';?> </p>
                    <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '';?> </p>
                <?php }?>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="nom">Nom</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_SESSION['nom']?>" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="cognom">Cognom</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" id="cognom" name="cognom" value="<?php echo $_SESSION['cognom']?>" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="dni">DNI</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $_SESSION['dni']?>" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="dataneixament">Data naixement</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="date" class="form-control" id="dataneixament" name="dataneixament" value="<?php echo $_SESSION['data_naix']?>" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="sexe">Sexe</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" id="sexe" name="sexe" value="<?php echo $_SESSION['sexe']?>" disabled>
                    </div>
                </div>

                <h2>Dades de contacte</h2>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="tel">Telèfon</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $_SESSION['telefon']?>" pattern="[0-9]{9}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    </div>
                </div>

                <h2>Dades d'accés</h2>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="user">Usuari</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['usuari']?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="password">Contrasenya</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="passwordConf">Confirmar contrasenya</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="password" class="form-control" id="passwordConf" name="passwordConf">
                    </div>
                </div>

                <h2>Dades de facturació</h2>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="iban">Compte bancari</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" id="iban" name="iban" value="<?php echo $_SESSION['compte_bancari']?>" disabled>
                    </div>
                </div>

                <h2>Altres dades</h2>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="dataalta">Data d'alta</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="date" class="form-control" id="dataalta" name="dataalta" value="<?php echo $_SESSION['data_alta']?>" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-4">
                        <label for="info">Informació comercial</label>
                    </div>
                    <div class="col-12 col-md-4">
                        <select type="checkbox" class="form-control" id="info" name="info">

                        <?php if ($_SESSION['com_comercial'] == 0) {?>
                            <option value="1">No</option>
                            <option value="0">Si</option>
                            <?php } else {?>
                            <option value="0">Si</option>
                            <option value="1">No</option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="row form-group button-submit">
                    <div class="col-12">
                        <input type="submit" name="submit" class="btn btn-success" value="Guardar">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <div class="container">
        <footer class="d-flex flex-wrap border-top">
            <p class="col-md-4 mb-0 text-muted">© 1<sup>er</sup> de DAM - Projecte 2</p>
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

    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>