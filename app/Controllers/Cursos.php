<?php 
namespace App\Controllers;
use Core\BaseController;
use App\Models\Curso;

/**
* 
*/
class Cursos extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->curso = new Curso();
	}

	public function showCourses()
	{
		$cursos = $this->curso->getCourses();

		$data['tabla_cursos'] = "";
		$data['menu'] = $this->menuApp;

		if($cursos != false){
			foreach ($cursos as $curso) {
				$data['tabla_cursos'] .= "	<tr>
									<td>{$curso->id_curso}</td>
									<td>{$curso->nombre_curso}</td>
									<td>{$curso->descrip_curso}</td>
								</tr>";
			}
		}		

		$this->getView('header', $data);
		$this->getView('cursos/listado_cursos',$data);
	}

	public function addNewCourse()
	{
		$data['menu'] = $this->menuApp;
		$this->getView('header', $data);
		$this->getView('cursos/nuevo_curso');
	}

	public function saveNewCourse()
	{
		$response = array(
			'status' => false,
			'message' => "",
			'data' => ""
		);	

		if(empty($_POST['nombrecurso']) || empty($_POST['descripcion'])){
			$response['message'] = "Debe escribir los datos solicitados";
			echo json_encode($response);
			exit();
		}
		
		$saveCourse = $this->curso->saveCourse($_POST);

		$response['status'] = true;
		$response['message'] = "Curso agregado correctamente.";
		
		echo json_encode($response);
		exit();
	}

	public function asignCourse()
	{
		$response = array(
			'status' => false,
			'message' => "",
			'data' => ""
		);

		if($_POST['curso'] == 0){
			$response['message'] = "Debe seleccionar un curso.";
			echo json_encode($response);
			exit();
		}

		$this->curso->asignACourse($_POST);
		
		$response['status'] = true;
		$response['message'] = "Curso asignado correctamente.";

		echo json_encode($response);
		exit();
	}

	public function addNewNote()
	{	
		$response = array(
			'status' => false,
			'message' => "",
			'data' => ""
		);

		if($_POST['curso'] == 0){
			$response['message'] = "Debe seleccionar un curso.";
			echo json_encode($response);
			exit();
		}

		if($_POST['bimestre'] == 0){
			$response['message'] = "Debe seleccionar un bimestre.";
			echo json_encode($response);
			exit();
		}

		if(empty($_POST['calificacion'])){
			$response['message'] = "Debe escribir la nota.";
			echo json_encode($response);
			exit();
		}		

		$this->curso->saveNote($_POST);
$response['post'] = $_POST;
		$response['status'] = true;
		$response['message'] = "Calificacion agregada correctamente";		

		echo json_encode($response);
		exit();
	}
}
