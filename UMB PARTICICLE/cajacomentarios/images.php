<?php
$conectar= new mysqli('localhost', 'root', 'heartfilia',"comentarios","3308");

//verificamos la conexion
if(!$conectar){
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}else{
$baseDedatos= mysqli_select_db($conectar,"comentarios");
//verificamos la base de datos
if(!$baseDedatos){
echo"No Se Encontro La Base De Datos";
}
}
    $tipoArchivo = $_FILES['foto']['type'];
    $nombreArchivo = $_FILES['foto']['name'];
    $tamanoArchivo = $_FILES['foto']['size'];
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);
    include_once "db_empresa.php";
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
    $binariosImagen = mysqli_escape_string($con, $binariosImagen);
    $query = "INSERT INTO imagenes (nombre            ,imagen                 ,tipo) values 
                        ('" . $nombreArchivo . "','" . $binariosImagen . "','" . $tipoArchivo . "');
                        ";
    $res = mysqli_query($con, $query);
?>
