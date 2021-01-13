<?php //Abrimos php
	//hacemos la conexion para la base de datos:
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
                if (isset($_REQUEST['comentar'])) {
                    if (isset($_FILES['imagen']['name'])) {
                        $tipoArchivo = $_FILES['imagen']['type'];
                        $nombreArchivo = $_FILES['imagen']['name'];
                        $tamanoArchivo = $_FILES['imagen']['size'];
                        $imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
						$binariosImagen = fread($imagenSubida, $tamanoArchivo);
						$nombre=$_POST['nombre'];
						$mensaje=$_POST['mensaje'];
                        $conectar= new mysqli('localhost', 'root', 'heartfilia',"comentarios","3308");
                        $binariosImagen = mysqli_escape_string($conectar, $binariosImagen);
                        $query = "INSERT INTO cajacomentarios (foto,	nombre,		mensaje) values 
                                                        ('" . $binariosImagen . "','" . $nombre . "','" . $mensaje . "');
                            ";
                        $res = mysqli_query($conectar, $query);
                        if ($res) {
                ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Registro insertado exitosamente
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Error <?php echo mysqli_error($conectar); ?>
                            </div>
                <?php
                        }
                    }
                }
?>