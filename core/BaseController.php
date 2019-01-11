<?php
declare(strict_types=1);

namespace Core;

/**
 *
 */
class BaseController
{
	public $menuApp;

	public function __construct()
	{
		$this->getMenu();
	}

	protected function getView($view, $data = array())
	{
		$viewFile = "../app/Views/{$view}.php";

		if(file_exists($viewFile)){
			require_once $viewFile;
		}else{
			echo "La vista que intenta cargar no existe.";
		}
	}

	protected function isAjaxRequest()
	{
		if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
			strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return true;
		}else{
			echo "<h1>No está autorizado para acceder</h1>";
			die();
		}
	}

	private function getMenu()
	{
		$menu = '<li class="nav-item">
				<a class="nav-link" href="/">Alumnos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/cursos">Cursos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/calificaciones">Consultar calificaciones</a>
			</li>';

		$this->menuApp = $menu;
	}

}
