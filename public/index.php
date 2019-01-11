<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load('../.env');

// ini_set("session.cookie_lifetime","240");
// ini_set("session.gc_maxlifetime","240");
//session_start();

$application = new App\Routes();