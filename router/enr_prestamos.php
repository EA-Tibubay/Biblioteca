<?php
require("../controllers/ctrl_prestamos.php");
$obj_ctrl= new ctrl_pre();

if(isset($_POST["btn"])){
	
	$obj_ctrl->insertar($_POST);
	
}elseif(isset($_GET["id_prestamo"])){
	
	$obj_ctrl->eliminar($_GET["id_prestamo"]);
	
}elseif(isset($_POST["modificar"])){
	
	$obj_ctrl->modificar($_POST);
	
}


?>