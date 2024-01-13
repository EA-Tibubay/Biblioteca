<?php
require("../models/mdl_login.php");

class ctrl_login{

public $objeto_modelo;

function __construct(){
$this->objeto_modelo= new mdl_login();
}
	
public function validar_ingreso($p){
   $usuario=$p['usuario'];
   $clave=$p['contrasena'];
   	$resp=$this->objeto_modelo->validar($usuario,$clave);
	
	if ($resp->num_rows > 0)
	{
		$row=mysqli_fetch_assoc($resp);
		
		if (password_verify($clave, $row['clave'])) {
			session_start();
            $_SESSION['usuario'] = $usuario;
            
        	echo "<script> window.location.href='../views/vst_dashboard.php';</script>";
   		} else {
		
		echo "<script>alert('usuario o clave incorrecta')</script>";
        echo "<script> window.location.href='../views/vst_login.php';</script>";
		}
	}
   else {
       echo "<script>alert('usuario o clave incorrecta')</script>";
       echo "<script> window.location.href='../views/vst_login.php';</script>";
   }
}
	
}

?>
