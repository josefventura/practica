<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <title>Registrate</title>
    
    
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">New User</h1>

        <hr class="border"/>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Username">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Password">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password" placeholder="Confirm Password">
        
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-envelope"></i><input type="text" name="email" class="password_btn" placeholder="e-mail">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>
            <?php if(!empty($errores)) :     ?>
            <div class="error">
                <ul>
                    <?php echo $errores;  ?>
                </ul>
            </div>
            <?php endif; ?>
        </form>
        <p class="texto-registrate"> have an account allready?
            <a href="login.php">Login</a>
        </p>
    </div>



</body>
</html>