<?php
require("../models/mdl_dashboard_reg_l.php");

class ctrl_reg_l{
    public $objeto_modelo;

    function __construct(){
        $this->objeto_modelo = new mdl_reg_l();
    }
    
    public function insertar($p){
        
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            
            $imagenNombre = $_FILES['imagen']['name'];
            $imagenTmp = $_FILES['imagen']['tmp_name'];

            
            $carpetaDestino = "../images/";
            if (!is_dir($carpetaDestino)) {
                mkdir($carpetaDestino);
            }

            
            $url = $carpetaDestino . $imagenNombre;

            
            if (move_uploaded_file($imagenTmp, $url)) {
                
                $this->objeto_modelo->set("imagen", $url);

                
                $this->objeto_modelo->set("titulo", $p["titulo"]);
                $this->objeto_modelo->set("autor", $p["autor"]);
                $this->objeto_modelo->set("editorial", $p["editorial"]);
                $this->objeto_modelo->set("anio_publicacion", $p["anio_publicacion"]);
                $this->objeto_modelo->set("genero", $p["genero"]);

                
                $this->objeto_modelo->insertar();

				
                
            } else {
                
                echo "Error al mover el archivo.";
            }
        } else {
            
            echo "Error al subir la imagen.";
        }
    }
    
	public function modificar($p) {
		
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        
        $imagenNombre = $_FILES['imagen']['name'];
        $imagenTmp = $_FILES['imagen']['tmp_name'];
		
        
        $carpetaDestino = "../images/";
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino);
        }

        
        $url = $carpetaDestino . $imagenNombre;
		
        
        if (move_uploaded_file($imagenTmp, $url)) {
            
            $this->objeto_modelo->set("imagen", $url);
        } else {
            
            echo "Error al mover el archivo.";
            return;
        }
    } else {
        
        $url = $p["ruta_imagen"];
    }
		
		
		$this->objeto_modelo->set("id_libro", $p["card-id"]);
		$this->objeto_modelo->set("titulo", $p["titulo"]);
		$this->objeto_modelo->set("autor", $p["autor"]);
		$this->objeto_modelo->set("editorial", $p["editorial"]);
		$this->objeto_modelo->set("anio_publicacion", $p["anio_publicacion"]);
		$this->objeto_modelo->set("genero", $p["genero"]);

		$this->objeto_modelo->set("imagen", $url);
		$this->objeto_modelo->modificar();
		
}

	
	public function eliminar(){
		$id_libro = $_GET["id_libro"];

		echo "Valor de id_libro: " . $id_libro;
		
		$this->objeto_modelo->set("id_libro",$_GET["id_libro"]);
		$this->objeto_modelo->eliminar();
	}
	
    public function listarLibros(){
        $res = $this->objeto_modelo->listar();
        return $res;
    }
	
	public function listarl(){
        $res = $this->objeto_modelo->listarl();
        return $res;
    }
		
	public function listarUsuarios(){
        $res = $this->objeto_modelo->listarU();
        return $res;
    }
	
	public function listarGaleria(){
        $res = $this->objeto_modelo->listarG();
        return $res;
    }
}
?>
