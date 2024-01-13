<?php

require("conexion.php");
class mdl_login{

public $obj_con;
	
function __construct(){
	$this->obj_con = new conexion();
}	

public function set($atributo, $valor){
	$this->$atributo=$valor;
}
	
public function validar($u){
	$sql="select * from usuarios WHERE correo_electronico ='$u';";
	return $this->obj_con->con_retorno($sql);	
}

}

?>