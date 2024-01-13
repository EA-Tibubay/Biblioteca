<?php
require("../models/mdl_dashboard_reg_u.php");
class ctrl_reg_u{

public $objeto_modelo;

function __construct(){
$this->objeto_modelo= new mdl_reg_u();
}
public function insertar($p){

	$this->objeto_modelo->set("nombre",$p["nombre"] );

	$this->objeto_modelo->set("apellidos",$p["apellidos"] );

	$this->objeto_modelo->set("ci",$p["ci"] );
	
	$this->objeto_modelo->set("correo_electronico",$p["correo_electronico"] );
	
	$this->objeto_modelo->set("clave",$p["clave"] );

	$this->objeto_modelo->set("tipo_usuario",$p["tipo_usuario"] );

	$this->objeto_modelo->insertar();
	
	session_start();
	$_SESSION['tipo_registro'] = 'usuarios';
	header("Location: ../views/vst_dashboard.php");
	exit();
	
}

public function modificar($p){
	
	$this->objeto_modelo->set("id_usuario",$p["card-id"]);

	$this->objeto_modelo->set("nombre",$p["nombre"] );

	$this->objeto_modelo->set("apellidos",$p["apellidos"] );

	$this->objeto_modelo->set("ci",$p["ci"] );
	
	$this->objeto_modelo->set("correo_electronico",$p["correo_electronico"] );

	$this->objeto_modelo->set("tipo_usuario",$p["tipo_usuario"] );
	
	$this->objeto_modelo->modificar();
	
	session_start();
	$_SESSION['tipo_registro'] = 'vst_u';
	header("Location: ../views/vst_dashboard.php");
	exit();
	
}

public function eliminar(){
	$this->objeto_modelo->set("id_usuario",$_GET["id_usuario"]);
	$this->objeto_modelo->eliminar();
	session_start();
	$_SESSION['tipo_registro'] = 'vst_u';
	header("Location: ../views/vst_dashboard.php");
	exit();
}
	
public function listarUsuarios(){
        $res = $this->objeto_modelo->listar();
        return $res;
    }
	
}
?>
