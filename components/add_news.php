<?php  

mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=utf-8');
require_once('../config/db_params.php');
require_once('../components/components.php');


$db = connectionToTheDatabase();



if (!empty($_POST['caption']) && !empty($_POST['description']) && !empty($_POST['date'])) {
	$caption = $_POST['caption'];
	$description = $_POST['description'];
	$date = $_POST['date'];
	$categoryID = $_POST['categories'];
	$activism = $_POST['activism'];
	$id = $_POST['id']; 
	$error = array();

	if (!empty($_FILES['picture']['name'])) {
		$path = 'img/';
		$tmp_path = 'tmp/';
		$types = array('image/gif', 'image/png', 'image/jpeg');
		$size = 1024000; // 1024000


		$names = explode('.', $_FILES['picture']['name']);
		$ext = array_pop($names);
		$_FILES['picture']['name'] = date('d.m.Y').'.'.time().'.'.$ext;
		
		if (!in_array($_FILES['picture']['type'], $types)) {
			$error = array('mes' => 'Prohibited file type.', 'active' => 'false');
		}
		
		if ($_FILES['picture']['size'] > $size) {
			$error = array('mes' => 'The file size is too large.', 'active' => 'false');
		}
		
			if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])) {
			$error = array('mes' => 'Something went wrong', 'active' => 'false');
		} else {
				$error = array('mes' => 'Download successful', 'active' => 'true');
		}

		$sql = 'UPDATE news SET picture = :picture, caption = :caption, description = :description, date = :date, category_id = :category_id, activism = :activism WHERE id = :id';
		$picture = 'img/'.$_FILES['picture']['name'];

		$data = $db->prepare($sql);
		$data->bindParam(':picture', $picture, PDO::PARAM_STR);
		$data->bindParam(':caption', $caption, PDO::PARAM_STR);
		$data->bindParam(':description', $description, PDO::PARAM_STR);
		$data->bindParam(':date', $date);
		$data->bindParam(':id', $id, PDO::PARAM_INT);
		$data->bindParam(':category_id', $categoryID);
		$data->bindParam(':activism', $activism, PDO::PARAM_STR);
		$res = $data->execute();
	} else {
		$sql = 'UPDATE news SET caption = :caption, description = :description, date = :date, category_id = :category_id, activism = :activism WHERE id = :id';
		$picture = 'img/'.$_FILES['picture']['name'];

		$data = $db->prepare($sql);
		$data->bindParam(':caption', $caption, PDO::PARAM_STR);
		$data->bindParam(':description', $description, PDO::PARAM_STR);
		$data->bindParam(':date', $date);
		$data->bindParam(':id', $id, PDO::PARAM_INT);
		$data->bindParam(':category_id', $categoryID);
		$data->bindParam(':activism', $activism, PDO::PARAM_STR);
		$res = $data->execute();	
	}

	

	if ($res) {
		$error = array('mes' => 'You have successfully submitted data!', 'active' => 'true');
	} else {
		$error = array('mes' => 'Mistake!', 'active' => 'false');
	}
}


echo json_encode($error);

if (isset($_POST['cancellation'])) {
	$uri = $_SERVER['REQUEST_URI'];
	$uri = substr($uri, 1, 5);
	if ($uri == 'admin') {
		header("location: /admin/");
		return true;
	}
	header("location: ../");
}

if (isset($_POST['delete'])) {
	$data = $db->prepare('DELETE FROM news WHERE id = :id');
	$data->bindParam(':id', $id);
	$res = $data->execute();	
	if ($res) {
		$uri = $_SERVER['REQUEST_URI'];
		$uri = substr($uri, 1, 5);
		if ($uri == 'admin') {
			header("location: /admin/");
			return true;
		}
		header("location: ../");	
	}
} 