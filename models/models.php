<?php

function getAllRecords($start, $perpage)
{
	$db = connectionToTheDatabase();
	$sql = 'SELECT * FROM news LIMIT :start, :perpage';
	$statement = $db->prepare($sql);
	$statement->bindParam(':start', $start, PDO::PARAM_INT);
	$statement->bindParam(':perpage', $perpage, PDO::PARAM_INT);
	$statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_CLASS);
	if (isset($data)) return $data;
}

function getOneNews($id)
{
	$db = connectionToTheDatabase();
	$sql = 'SELECT * FROM news WHERE id = :id';
	$statement = $db->prepare($sql);
	$statement->bindParam(':id', $id, PDO::PARAM_INT);
	$statement->execute();
	return $statement->fetch(PDO::FETCH_ASSOC);
}

function weGetNewUser()
{
	$db = connectionToTheDatabase();
	$secret = 'shakirzhan';
	if (isset($_POST['register'])) { 
		if (!empty($_POST['username']) && !empty($_POST['password'])) { 
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$password = md5($password.$secret);

			$statement = $db->prepare("SELECT 1 FROM users WHERE username = ?");
			$statement->execute([$username]);
			$found = $statement->fetchColumn();
			if (!$found) {
				$sql = 'INSERT INTO users (username, password) VALUES(:username, :password)';
				$statement = $db->prepare($sql);
				$statement->bindParam(':username', $username, PDO::PARAM_STR);
				$statement->bindParam(':password', $password, PDO::PARAM_STR);
				$res = $statement->execute();
				if ($res) {
					return '<div class="alert alert-success" role="alert">Вы успешно зарегистрированы!</div>';
				} else {
					return '<div class="alert alert-danger" role="alert">Ошибка проверьте данные!</div>';	
				}
			} else {
				return '<div class="alert alert-danger" role="alert">Это имя пользователя уже существует!</div>';
			}
		}
	}
}

function singleUserRegistration()
{
	$db = connectionToTheDatabase();
	$secret = 'shakirzhan';
	if (isset($_POST['login'])) {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$password = md5($password.$secret);
			
			$sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
			$statement = $db->prepare($sql);
			$statement->bindParam(':username', $username, PDO::PARAM_INT);
			$statement->bindParam(':password', $password, PDO::PARAM_INT);
			$statement->execute();
			$count = $statement->rowCount();
			if ($count != 0) {
				$row = $statement->fetch(PDO::FETCH_ASSOC);
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				if ($username == $dbusername && $dbpassword) {
					$_SESSION['session_username'] = $username;
					header('Location: ../');
				}
			} else {
				return 'Неправильное имя пользователя или пароль!';
			}
		}
	}
}

function AddNews()
{
	$db = connectionToTheDatabase();
	if (isset($_POST['append'])) {
		if (!empty($_POST['caption']) && !empty($_POST['description']) && !empty($_POST['date'])) {
			$caption = $_POST['caption'];
			$description = $_POST['description'];
			$date = $_POST['date'];

			if (!empty($_FILES['picture']['name'])) {
				$path = 'img/';
				$tmp_path = 'tmp/';
				$types = array('image/gif', 'image/png', 'image/jpeg');
				$size = 1024000; // 1024000


				$names = explode('.', $_FILES['picture']['name']);
				$ext = array_pop($names);
	  		$_FILES['picture']['name'] = date('d.m.Y').'.'.time().'.'.$ext;
	  		
	  		if (!in_array($_FILES['picture']['type'], $types)) {
	  			return '<div class="alert alert-danger" role="alert">Запрещённый тип файла.</div>';
	  		}
	  		
	  		if ($_FILES['picture']['size'] > $size) {
	  			return '<div class="alert alert-danger" role="alert">Слишком большой размер файла.</div>';
	  		}
	  		
	 			if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])) {
	  			return '<div class="alert alert-danger" role="alert">Что-то пошло не так</div>';
	  		} else {
	 				$mes = '<div class="alert alert-success" role="alert">Загрузка удачна</div>';
	  		}

				$sql = 'INSERT INTO news (picture, caption, description, date) VALUES(:picture, :caption, :description, :date)'; 
				$picture = 'img/'.$_FILES['picture']['name'];

				$data = $db->prepare($sql);
				$data->bindParam(':picture', $picture, PDO::PARAM_STR);
				$data->bindParam(':caption', $caption, PDO::PARAM_STR);
				$data->bindParam(':description', $description, PDO::PARAM_STR);
				$data->bindParam(':date', $date);
				$res = $data->execute();
  		} else {
  			$sql = 'INSERT INTO news (caption, description, date) VALUES(:caption, :description, :date)';
				$picture = 'img/'.$_FILES['picture']['name'];

				$data = $db->prepare($sql);
				$data->bindParam(':caption', $caption, PDO::PARAM_STR);
				$data->bindParam(':description', $description, PDO::PARAM_STR);
				$data->bindParam(':date', $date);
				$res = $data->execute();	
  		}

  		if ($res) {
				return '<div class="alert alert-success" role="alert">Вы успешно отправили данные!</div>';
			} else {
				return '<div class="alert alert-danger" role="alert">Ошибка!</div>';
			}
		}	
	}
}

function getCategoriesList()
{
	$db = connectionToTheDatabase();
	$categoryList = array();

  $result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');

  $i = 0;
  while ($row = $result->fetch()) {
      $categoryList[$i]['id'] = $row['id'];
      $categoryList[$i]['name'] = $row['name'];
      $i++;
  }

  return $categoryList;
}

function getNewsUnderCategories($start, $perpage, $category_id)
{
	$db = connectionToTheDatabase();
	$sql = 'SELECT * FROM news WHERE category_id = :category_id LIMIT :start, :perpage';
	$statement = $db->prepare($sql);
	$statement->bindParam(':start', $start, PDO::PARAM_INT);
	$statement->bindParam(':perpage', $perpage, PDO::PARAM_INT);
	$statement->bindParam(':category_id', $category_id, PDO::PARAM_INT);
	$statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_CLASS);
	if (isset($data)) return $data;
}