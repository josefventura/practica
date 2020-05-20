<?php  session_start();

if (isset($_SESSION['usuario'])){
    header('location: index.php');
}
$errores="";
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $pass =$_POST['password'];
    $pass = hash('sha512', $pass); 

    try {
        $conexion= new PDO("mysql: host=localhost; dbname=login", "root", "");

    } catch (PDOexception $e) {
        echo 'Error: ' . $e->getMessage();

    }
    $query = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass');
    $query->execute(array(':usuario'=> $usuario, ':pass'=> $pass));
    $validar = $query->fetch();
    
    if($validar != false){
        
        $_SESSION['usuario'] = $usuario;
        header('location:index.php');
       
    }else{
        $errores .='<li>invalid user or password</li>';
    }

}


require("view/login.view.php");



?>