<!DOCTYPE html>
<html lang="en">

<head>
    <title> Iniciar sesión </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once('../vistas/_css.php') ?>


</head>

<body>

    <div class="container">

        <h1 class="text-center"> Iniciar sesión </h1>

        <?php if($error): ?>
            <div class="alert alert-danger"> <?php echo $error ?> </div>
        <?php endif; ?>

        <form action="login.php" method="post">
            <div class="form-group mb-3">
                <label for="email"> Email </label>
                <input type="email" class="form-control" name="email_usuario" id="email" placeholder="Ingrese su correo electrónico">
            </div>
            <div class="form-group mb-3">
                <label for="contrasena"> Contraseña </label>
                <input type="password" class="form-control" name="contrasena_usuario" id="contrasena">
            </div>
            <button type="submit" class="btn btn-success mb-3" name="login"> Ingresá </button>
        </form>

    </div>

    <?php require_once('../vistas/_footer.php') ?>
    <?php require_once('../vistas/_js.php') ?>
</body>

</html>