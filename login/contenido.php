<?php session_start();
if (isset($_SESSION['usuario'])){

    require('view/contenido.view.php');

}else{

    header('location:login.php');
}




?>