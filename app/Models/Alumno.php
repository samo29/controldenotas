<?php 

namespace App\Models;
use Core\BaseModel;

class Alumno extends BaseModel
{
	public function getStudents(){
		$this->query = "SELECT * FROM alumno;";
		$this->getData();

		if(count($this->results) > 0){
			return $this->results;
		}else{
			return 0;
		}	
	}

	public function saveStudent($alumno)
	{
		extract($alumno);

		$this->query = "INSERT INTO alumno(nombres_alumno,apellidos_alumno,carnet_alumno,edad)
						VALUES (?,?,?,?);";
		$this->params = array($nombres,$apellidos,rand(1000000,9999999),$edad);

		if($this->execQuery()){
			return true;
		}else{
			return false;
		}
	}	
}
