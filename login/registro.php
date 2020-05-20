<?php session_start();

if (isset($_SESSION['usuario'])){
    header('location: index.php');
}
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $pass =$_POST['password'];
    $pass2 =$_POST['password2'];
    $email =$_POST['email'];
    $validacion = filter_var($email, FILTER_VALIDATE_EMAIL);
    $errores='';
    //validaciones
    if (empty($usuario) or empty($pass) or empty($pass2) or empty($email)){
        $errores .='<li>please fill all the spaces</li>';
    }else{
    try{ 
        $conexion= new PDO("mysql: host=localhost; dbname=login", "root", "");

    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
    }
    $query = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
    $query->execute(array(':usuario'=>$usuario));
    $resultado= $query->fetch();
    if ($resultado != false){
        $errores .= '<li>this user is unavailable</li>';

    }
    $pass = hash('sha512', $pass);
    $pass2 = hash('sha512', $pass2);

    if($pass != $pass2){
        $errores .='<li>the passwords not match</li>';
    }

    if(!$validacion){
        $errores .='<li>please enter a valid email address</li>';
    }
        if($errores== ""){
            $query = $conexion->prepare('INSERT INTO usuarios (ID, usuario, pass, correo) values (null, :usuario, :pass, :correo)');
            $query->execute(array( ':usuario'=> $usuario, ':pass'=> $pass, ':correo'=> $email));
            header('location: login.php');
        }
    
    
    
    }
    //fin de las validaciones
}
require('view/registro.view.php');




?>