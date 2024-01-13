<?php

require("conexion.php");
class mdl_pre{

//estas variables deben coincidir con las variables del controlador
private $id_prestamo;
private $id_libro;
public $id_usuario;
public $fecha_prestamo;
public $fecha_devolucion;
public $disponibilidad;
public $conec;

function __construct(){
$this->id_prestamo=0;
$this->id_libro=0;
$this->id_usuario=0;
$this->fecha_prestamo="";
$this->fecha_devolucion="";
$this->disponibilidad="";
$this->conec=new conexion();
}
	
public function set($atributo, $valor){
	$this->$atributo=$valor;
}
	
public function insertar(){
	$sql="INSERT INTO prestamos (id_libro, id_usuario, fecha_prestamo, fecha_devolucion)
	values('$this->id_libro', '$this->id_usuario', '$this->fecha_prestamo', '$this->fecha_devolucion')";
	$sql2="UPDATE libros SET disponibilidad = 'prestado' WHERE id_libro = '$this->id_libro'";
  $this->conec->sin_retorno($sql);
  $this->conec->sin_retorno($sql2);
}
	
public function modificar(){
	
	$sql2 = "SELECT id_libro FROM prestamos WHERE id = '$this->id_prestamo'";
	$resultadoConsulta = $this->conec->con_retorno($sql2);
	
	$sql = "UPDATE prestamos SET  fecha_prestamo = '$this->fecha_prestamo', fecha_devolucion = '$this->fecha_devolucion' WHERE id = '$this->id_prestamo'";
	
	$id_l = mysqli_fetch_assoc($resultadoConsulta)['id_libro'];
	
	$sql3 = "UPDATE libros SET disponibilidad = '$this->disponibilidad' WHERE id_libro = '$id_l'";

 	$this->conec->sin_retorno($sql);
 	$this->conec->sin_retorno($sql3);
}
	
	
public function listar(){
	$sql="select * from libros";
	$res= $this->conec->con_retorno($sql);
	return $res;
}

public function listarU(){
	$sql="select id_usuario, nombre, apellidos from usuarios";
	$res= $this->conec->con_retorno($sql);
	return $res;
}

public function eliminar(){
	$sql="delete from prestamos where id='$this->id_prestamo'";
	$this->conec->sin_retorno($sql);
}
	
public function listarP(){
	$sql="SELECT
    p.id AS id_prestamo,
    u.nombre AS nombre_usuario,
    u.apellidos AS apellidos_usuario,
    l.titulo AS nombre_libro,
    p.fecha_prestamo,
    p.fecha_devolucion,
    l.disponibilidad
FROM
    prestamos p
JOIN
    libros l ON p.id_libro = l.id_libro
JOIN
    usuarios u ON p.id_usuario = u.id_usuario;";
		$res= $this->conec->con_retorno($sql);
		return $res;
}	
}//fin de la clase

?>
