<?php 
namespace App\Controllers;
use Core\BaseController;
use App\Models\Calificacion;

/**
* 
*/
class Calificaciones extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->calificacion = new Calificacion();
	}

	public function showNotes()
	{
		$calificaciones = $this->calificacion->getNotes();

		$data['tabla_calificaciones'] = "";
		$data['menu'] = $this->menuApp;

		if($calificaciones != false){
			foreach ($calificaciones as $nota) {
				$data['tabla_calificaciones'] .= "<tr>
									<td>{$nota->carnet_alumno}</td>
									<td>{$nota->nombres_alumno} {$nota->apellidos_alumno}</td>
									<td>{$nota->nombre_curso}</td>
									<td>{$nota->bimestre_uno}</td>
									<td>{$nota->bimestre_dos}</td>
									<td>{$nota->bimestre_tres}</td>
									<td>{$nota->bimestre_cuatro}</td>
								</tr>";
			}
		}		

		$this->getView('header', $data);
		$this->getView('cursos/listado_calificaciones',$data);
	}

}
