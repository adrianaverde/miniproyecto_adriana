<?php
namespace App\controllers;
use App\models\Generalmodel;

class General extends BaseController{
	
	public function index(){
		
		$gModel = new GeneralModel();
		$mensaje = session('mensaje');
		$datos = $gModel->listarTodo();
		$data = ["datos" => $datos,
			  "mensaje" => $mensaje
			  
	        ];
		return view('listado',$data);
		
	}
	
	public funtion obtenerDatos($id){
		$gModel = new GeneralModel();
		$data = ["id" => $id];
		$respuesta = $gModel ->obtenerInformacion($data);
		
		$datos = ["datos" => $respuesta];
		return view('actualizar',$datos);
		
	}
	
	public funtion insertar(){
		$gModel = new GeneralModel();
		$data = [
			"nombre" => $_POST['nombre'],
			"a_paterno"=> $_POST['apaterno'],
			"a_materno" => $_POST['amaterno'],
		];
		$respuesta = $gModel->insertar($data);
		
		if ($respuesta > 0){
			return redirect()->to(base_url('/index.php))->with('mensaje','0');
		}else{
			return redirect()->to(base_url('/index.php'))->with('mensaje','1');
		}
	
	}
	
	
	
	public funtion actualizar(){
	
	  $gModel = new GeneralModel();
	  $data = [
	      "nombre" => $_POST['nombre'],
	      "a_paterno" => $_POST['apaterno'],
	      "a_materno" => $_POST['amaterno'],
	      
	  ];
	  
	  $id = ["id" => $_POST['id']];
	  $respuesta = $gModel ->actualizar($data,$id);
	  
	  if ($respuesta){
	      return redicter()->to(base_url('/index.php'))->with('mensaje','2');
	  }else{
	      return redirec()->to(base_url('/index.php'))->with('mensaje','3');
	  }
	  
   }
   
          public funtion eliminar($idpersona){
	      $gModel = new GeneralModel();
	      $id =["id" => $idPersina];
	      $respuesta = $gModel->eliminar($id);
	      
	      if($respuesta){
	          return redirect()->to(base_url('/index.php'))->with('mensaje','4');
	      }else{
	          return redirect()->to(base_url('/index.php'))->with('mensaje','5');
	      }
	      
	  }
}
