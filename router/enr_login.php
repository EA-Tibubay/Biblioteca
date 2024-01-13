<?php
require("../controllers/ctrl_login.php");

$obj_ctrl= new ctrl_login();

if (isset($_POST['btn'])){

	$obj_ctrl->validar_ingreso($_POST);

}

?>