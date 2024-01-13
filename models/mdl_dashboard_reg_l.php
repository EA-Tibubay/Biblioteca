<?php

require("conexion.php");
class mdl_reg_l{

private $id_libro;
public $titulo;
public $autor;
public $editorial;
public $anio_publicacion;
public $genero;
public $imagen;
public $conec;

function __construct(){
$this->id_libro=0;
$this->titulo="";
$this->autor="";
$this->editorial="";
$this->anio_publicacion=0;
$this->genero = "";
$this->imagen = "";
$this->conec=new conexion();
}
	
public function set($atributo, $valor){
	$this->$atributo=$valor;
}
	
public function insertar(){
	$sql="insert into libros (titulo, autor, editorial, anio_publicacion, genero, imagen, disponibilidad)
	values(
	 '$this->titulo', '$this->autor', '$this->editorial', '$this->anio_publicacion', '$this->genero', '$this->imagen','disponible')";
  $this->conec->sin_retorno($sql);
}

public function modificar(){
	$sql = "UPDATE libros SET titulo = '$this->titulo', autor = '$this->autor', editorial = '$this->editorial', anio_publicacion = '$this->anio_publicacion', genero = '$this->genero', imagen = '$this->imagen', disponibilidad = 'disponible' WHERE id_libro = '$this->id_libro'";
  $this->conec->sin_retorno($sql);
}
	
public function eliminar(){

	echo "Valor de id_libro mdfelo: " . $this->id_libro;
	$sql="delete from libros where id_libro='$this->id_libro'";
	$this->conec->sin_retorno($sql);
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

public function listarG(){
	$sql="SELECT * FROM libros ORDER BY id_libro DESC LIMIT 4;";
	$res= $this->conec->con_retorno($sql);
	return $res;
}

public function listarl(){
	$sql="SELECT * FROM libros ORDER BY id_libro DESC;";
	$res= $this->conec->con_retorno($sql);
	return $res;
}	

}//fin de la clase

?>
