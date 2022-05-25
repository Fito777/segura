<?php
session_start();

include('db.php');

$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];

$USUARIO = stripcslashes($USUARIO);
$PASSWORD = stripcslashes($PASSWORD);
$USUARIO = mysqli_real_escape_string($conexion, $USUARIO);
$PASSWORD = mysqli_real_escape_string($conexion, $PASSWORD);


$consulta = "SELECT* FROM Personal where usuario ='$USUARIO' and password ='$PASSWORD' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.html");

}else{
    include("index.html");
    ?>
    <h1>ERROR DE AUTENTIFICACION</h1>
    <?php
    
}
mysqli_free_result($resultado);
mysqli_close($conexion);





?>