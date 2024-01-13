<?php
require("../controllers/ctrl_dashboard_reg_u.php");
$obj_ctrl= new ctrl_reg_u();

if(isset($_POST["btn"])){

	$obj_ctrl->insertar($_POST);
	
}elseif(isset($_GET["id_usuario"])){
	
	$obj_ctrl->eliminar($_GET["id_usuario"]);
	
}elseif(isset($_POST["modificar"])){
	
	$obj_ctrl->modificar($_POST);
	
}

?>