<?php 

namespace App\Models;
use Core\BaseModel;

class Cliente extends BaseModel
{
	public function getClients(){
		$this->query = "SELECT * FROM cliente;";
		$this->getData();

		if(count($this->results) > 0){
			return $this->results;
		}else{
			return 0;
		}	
	}

	public function saveClient($cliente)
	{
		extract($cliente);

		$this->query = "INSERT INTO cliente (nombrescliente,apellidoscliente,telefonocliente,direccioncliente,correoelectronico)
						VALUES (?,?,?,?,?);";
		$this->params = array($nombres,$apellidos,$telefono,$email,$direccion);

		if($this->execQuery()){
			return true;
		}else{
			return false;
		}
	}	
}