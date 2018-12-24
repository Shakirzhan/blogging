<?php

session_start();

mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/autoload.php');

$uri = $_SERVER['REQUEST_URI'];
$action = (isset($_GET['action'])) ? $_GET['action'] : '';

switch ($uri) {
	case '/':
		displayEntries();
		break;
	
	default:
		switch ($action) {
			case 'detail':
				outputOneNews();
				break;
			case 'page':
				displayEntries();
				break;
			case 'registration':
				registration();
				break;
			case 'login':
				login();
				break;
			case 'logout':
				unset($_SESSION['session_username']);
				session_destroy();
				header("location: ../");
				break;
			
			default:
				# code...
				break;
		}
		break;
}