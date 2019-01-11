<?php 

namespace App\Models;
use Core\BaseModel;

class Curso extends BaseModel
{
	public function getCourses(){
		$this->query = "SELECT * FROM curso;";
		$this->getData();

		if(count($this->results) > 0){
			return $this->results;
		}else{
			return 0;
		}	
	}

	public function saveCourse($curso)
	{
		extract($curso);

		$this->query = "INSERT INTO curso(nombre_curso,descrip_curso)
						VALUES (?,?);";
		$this->params = array($nombrecurso,$descripcion);

		if($this->execQuery()){
			return true;
		}else{
			return false;
		}
	}

	public function asignACourse($asignacion)
	{
		extract($asignacion);

		$this->query = "INSERT INTO asignacurso(id_alumno,id_curso)
						VALUES (?,?);";
		$this->params = array($idalumno,$curso);

		if($this->execQuery()){
			return true;
		}else{
			return false;
		}
	}

	public function saveNote($calificacion)
	{
		extract($calificacion);

		$this->query = "INSERT INTO calificacioncurso(bimestre,id_alumno,id_curso,nota)
						VALUES (?,?,?,?);";
		$this->params = array($bimestre,$idalumnonota,$curso,$calificacion);

		if($this->execQuery()){
			return true;
		}else{
			return false;
		}
	}
}
