<?php

session_start();

mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('autoload.php');

$uri = $_SERVER['REQUEST_URI'];
$action = (isset($_GET['action'])) ? $_GET['action'] : '';

if (isset($_SESSION['session_username'])) {
	if ($_SESSION['session_username'] == ADMIN_USERNAME) {

		switch ($uri) {
			case '/admin/':
				displayNewsList();
				break;
			
			default:
				switch ($action) {
					case 'edit':
						editFormAdmin();
						break;
					
					default:
						# code...
						break;
				}
				break;
		}

	} else { 
		echo showTemplate("Вы не являетесь администратором сайта...", "message");
		return false;
	} 
} else {
	echo showTemplate("Пожалуйста авторизуйтесь...", "message"); 
	return false;
}