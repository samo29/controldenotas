<?php 

namespace App\Models;
use Core\BaseModel;

class Calificacion extends BaseModel
{
	public function getNotes(){
		$this->query = "SELECT carnet_alumno,nombres_alumno,apellidos_alumno,nombre_curso,SUM(bimestre_uno)bimestre_uno,
				SUM(bimestre_dos)bimestre_dos,SUM(bimestre_tres)bimestre_tres,
				SUM(bimestre_cuatro)bimestre_cuatro
				FROM (
				SELECT a.carnet_alumno,a.nombres_alumno,a.apellidos_alumno,d.nombre_curso,
					CASE WHEN bimestre = 1 THEN c.nota ELSE null END AS bimestre_uno,
					CASE WHEN bimestre = 2 THEN c.nota ELSE null END AS bimestre_dos,
					CASE WHEN bimestre = 3 THEN c.nota ELSE null END AS bimestre_tres,
					CASE WHEN bimestre = 4 THEN c.nota ELSE null END AS bimestre_cuatro
					FROM alumno a
					JOIN asignacurso b ON b.id_alumno = a.id_alumno
					JOIN calificacioncurso c ON c.id_alumno = a.id_alumno and c.id_curso = b.id_curso
					JOIN curso d ON d.id_curso = b.id_curso
				)z
				GROUP BY carnet_alumno,nombres_alumno,apellidos_alumno,nombre_curso;";
		$this->getData();

		if(count($this->results) > 0){
			return $this->results;
		}else{
			return 0;
		}	
	}

}
