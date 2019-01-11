<?php
declare(strict_types=1);

namespace Core;
/**
* 
*/
class BaseModel
{

	private $pdo;
	public $query = '';
	public $params = array();
	public $results = array();
	private $sql = '';

	public function __construct(){
        extract($this->set_temp_connection_vars());
        try {
            $this->pdo = new \PDO($connection_string, getenv('DB_USER'), getenv('DB_PASS'));
        } catch (PDOException $e) {
            echo "<pre>".$e."</pre>";
        }
	}

	public function getData(){
		$this->sql = $this->pdo->prepare($this->query);
		$this->sql->execute($this->params);
		$this->results = $this->sql->fetchAll(\PDO::FETCH_OBJ);
	}

	public function execQuery(){
		$this->sql = $this->pdo->prepare($this->query);
		$this->sql->execute($this->params);
	}	

    private function set_temp_connection_vars() {
	    $connection_data = array(getenv('DB_DRIVER'), getenv('DB_HOST'), getenv('DB_NAME'));
	    $format_string = "%s:host=%s;dbname=%s";
	    $connection_string = vsprintf($format_string, $connection_data);
	    $options = array(\PDO::ATTR_PERSISTENT=>true);
	    return get_defined_vars();
    }


}