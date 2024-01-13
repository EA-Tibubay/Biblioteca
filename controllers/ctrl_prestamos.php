<?php
require("../models/mdl_prestamo.php");
class ctrl_pre{

public $objeto_modelo;

function __construct(){
$this->objeto_modelo= new mdl_pre();
}
	
public function insertar($p){

	$this->objeto_modelo->set("id_libro",$p["id_libro"] );

	$this->objeto_modelo->set("id_usuario",$p["id_usuario"] );

	$this->objeto_modelo->set("fecha_prestamo",$p["fecha_inicio"] );
	
	$this->objeto_modelo->set("fecha_devolucion",$p["fecha_fin"] );
	
	$this->objeto_modelo->insertar();
	
	session_start();
	$_SESSION['tipo_registro'] = 'prestamos';
	header("Location: ../views/vst_dashboard.php");
	exit();
}

public function modificar($p){
	
	$this->objeto_modelo->set("id_prestamo",$p["card-id"]);

	$this->objeto_modelo->set("fecha_prestamo",$p["fecha_inicio"] );
	
	$this->objeto_modelo->set("fecha_devolucion",$p["fecha_fin"] );

	$this->objeto_modelo->set("disponibilidad",$p["tipo_usuario"] );
	
	$this->objeto_modelo->modificar();
	
	session_start();
	$_SESSION['tipo_registro'] = 'vst_p';
	header("Location: ../views/vst_dashboard.php");
	exit();
	
}
	
public function eliminar(){
	
	$this->objeto_modelo->set("id_prestamo",$_GET["id_prestamo"]);
	$this->objeto_modelo->eliminar();
	session_start();
	$_SESSION['tipo_registro'] = 'vst_p';
	header("Location: ../views/vst_dashboard.php");
	exit();
}
	
public function listarPrestamos(){
	$res = $this->objeto_modelo->listarP();
	return $res;
}
	
}
?>
