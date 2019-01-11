<?php 
namespace App\Controllers;
use Core\BaseController;
use App\Models\Alumno;
use App\Models\Curso;

/**
* 
*/
class Alumnos extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->alumno = new Alumno();
	}

	public function showStudents()
	{
		$alumnos = $this->alumno->getStudents();
		$curso = new Curso();
		
		$cursos = $curso->getCourses();

		if($cursos){
			$data['cursos'] = "<select class='form-control' name='curso'>
						<option value='0'>Seleccione un curso</option>";

			foreach($cursos as $curso){
				$data['cursos'] .= "<option value='{$curso->id_curso}'>{$curso->nombre_curso}</option>";
			}
			
			$data['cursos'] .= "</select>";
		}

		$data['tabla_alumnos'] = "";
		$data['menu'] = $this->menuApp;

		if($alumnos != false){
			foreach ($alumnos as $alumno) {
				$data['tabla_alumnos'] .= "	<tr>
									<td>{$alumno->carnet_alumno}</td>
									<td>{$alumno->nombres_alumno} {$alumno->apellidos_alumno}</td>
									<td>{$alumno->edad}</td>
									<td>
										<i class='fa fa-address-book asignacion' id='{$alumno->id_alumno}' style='cursor:pointer;' data-toggle='modal' data-target='#asignacioncursos' type='button' title='Asignar curso'></i>
										<i class='fa fa-plus agregarn' type='button' title='Agregar nota' id='{$alumno->id_alumno}' style='cursor:pointer;' data-toggle='modal' data-target='#agregarnota'></i>
									</td>
								</tr>";
			}
		}		

		$this->getView('header', $data);
		$this->getView('alumnos/listado_alumnos',$data);
	}

	public function addNewStudent()
	{
		$data['menu'] = $this->menuApp;
		$this->getView('header', $data);
		$this->getView('alumnos/nuevo_alumno');
	}

	public function saveNewStudent()
	{
		$response = array(
			'status' => false,
			'message' => "",
			'data' => ""
		);	


		$saveStudent = $this->alumno->saveStudent($_POST);

		$response['status'] = true;
		$response['message'] = "Alumno agregado correctamente.";
		
		//$response['message'] = "No se ha podido agregar el nuevo cliente.";
		
		echo json_encode($response);
		exit();
	}
}
