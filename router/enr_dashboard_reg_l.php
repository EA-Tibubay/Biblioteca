<?php
require("../controllers/ctrl_dashboard_reg_l.php");
$obj_ctrl= new ctrl_reg_l();

if(isset($_POST["btn"])){

$obj_ctrl->insertar($_POST);
	
	session_start();
	$_SESSION['tipo_registro'] = 'libros';
	header("Location: ../views/vst_dashboard.php");
	exit();
	
}elseif(isset($_GET["id_libro"])){
	
	$obj_ctrl->eliminar($_GET["id_libro"]);
	session_start();
	$_SESSION['tipo_registro'] = 'vst_l';
	header("Location: ../views/vst_dashboard.php");
	exit();
	
}elseif(isset($_POST["modificar"])){
	
	$obj_ctrl->modificar($_POST);
	session_start();
	$_SESSION['tipo_registro'] = 'vst_l';
	header("Location: ../views/vst_dashboard.php");
	exit();
}


?>