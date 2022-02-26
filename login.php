<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Gim</title>
    <link rel="stylesheet" href="src/css/reset.css"/>
    <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css"/>
    <link rel="stylesheet" href="src/css/fontawesome/all.min.css"/>
    <link rel="stylesheet" href="src/css/style.css"/>
</head>
<body>
    <main class="login-main">
        <form method="POST">
            <a class="logo" href="index.html">
                <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal">
            </a>
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
            <button type="submit" class="btn btn-success">Entrar</button>
        </form>
    </main>

    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>