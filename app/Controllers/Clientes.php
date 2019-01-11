<?php 
namespace App\Controllers;
use Core\BaseController;
use App\Models\Cliente;

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
/**
* 
*/
class Clientes extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->cliente = new Cliente();
	}

	public function showClients()
	{
		$clientes = $this->cliente->getClients();

		//print "<pre>";
		//print_r($clientes);

		$data['tabla-clientes'] = "";
		$data['menu'] = $this->menuApp;

		if($clientes != false){
			foreach ($clientes as $cliente) {
				$data['tabla-clientes'] .= "	<tr>
													<td>{$cliente->nombrescliente} {$cliente->apellidoscliente}</td>
													<td>{$cliente->telefonocliente}</td>
													<td>{$cliente->correoelectronico}</td>
													<td>{$cliente->direccioncliente}</td>
												</tr>";
			}
		}		

		$this->getView('header', $data);
		$this->getView('clientes/listado_clientes',$data);
	}

	public function addNewClient()
	{
		$data['menu'] = $this->menuApp;
		$this->getView('header', $data);
		$this->getView('clientes/nuevo-cliente');
	}

	public function saveNewClient()
	{
		$response = array(
			'status' => false,
			'message' => "",
			'data' => ""
		);	

		// $validator = new \GUMP();

		// $validator->validation_rules(array(
		// 	'nombres'    => 'required|alpha_space',
		// 	'apellidos'    => 'required|alpha_space',
  //           'telefono'    => 'required|numeric',
  //           'email'    => 'required|valid_email',
  //           'direccion'    => 'required|alpha_space'                              
		// ));

		// $validator->filter_rules(array(
		// 	'nombres' => 'trim|sanitize_string',
		// 	'apellidos' => 'trim|sanitize_string',
  //           'telefono' => 'trim|sanitize_numbers',
  //           'email' => 'trim|sanitize_email',
  //           'direccion' => 'trim|sanitize_string'
		// ));

		// $validated_data = $validator->run($_POST);	

		// if($validated_data === false) {
		// 	$response['message'] = $validator->get_readable_errors(true);
		// 	echo json_encode($response);
		// 	exit();
		// }

		$saveClient = $this->cliente->saveClient($_POST);

		$response['status'] = true;
		$response['message'] = "Cliente agregado correctamente.";
		
		//$response['message'] = "No se ha podido agregar el nuevo cliente.";
		
		echo json_encode($response);
		exit();
	}
}