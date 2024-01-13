<?php

require("conexion.php");
class mdl_reg_u{
public $id_usuario;
public $nombre;
public $apellidos;
public $ci;
public $correo_electronico;
public $clave;
public $tipo_usuario;
public $conec;

function __construct(){
$this->id_usuario=0;
$this->nombre="";
$this->apellidos="";
$this->ci=0;
$this->correo_electronico="";
$this->clave = "";
$this->tipo_usuario = "";
$this->conec=new conexion();
}
	
public function set($atributo, $valor){
	$this->$atributo=$valor;
}
	
public function insertar(){
	
    $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);
	
	$sql="insert into usuarios (nombre, apellidos, ci, correo_electronico, clave, tipo_usuario)
	values(
	 '$this->nombre', '$this->apellidos', '$this->ci', '$this->correo_electronico', '$hashedPassword', '$this->tipo_usuario')";
	
  $this->conec->sin_retorno($sql);
}	

public function modificar(){
	
	$sql = "UPDATE usuarios 
        SET nombre = '$this->nombre', apellidos = '$this->apellidos', ci = '$this->ci', correo_electronico = '$this->correo_electronico', tipo_usuario = '$this->tipo_usuario' WHERE id_usuario = '$this->id_usuario'";
  $this->conec->sin_retorno($sql);
}
	
public function eliminar(){
	$sql="delete from usuarios where id_usuario='$this->id_usuario'";
	$this->conec->sin_retorno($sql);
}
	
public function listar(){
		$sql="select * from usuarios";
		$res= $this->conec->con_retorno($sql);
		return $res;
}
	
}

?>