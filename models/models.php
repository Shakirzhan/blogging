<?php

function getAllRecords($start, $perpage)
{
	$activism = 'Y';
	$db = connectionToTheDatabase();
	$sql = 'SELECT * FROM news WHERE activism = :activism ORDER BY id DESC LIMIT :start, :perpage ';
	$statement = $db->prepare($sql);
	$statement->bindParam(':start', $start, PDO::PARAM_INT);
	$statement->bindParam(':perpage', $perpage, PDO::PARAM_INT);
	$statement->bindParam(':activism', $activism, PDO::PARAM_STR);
	$statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_CLASS);
	if (!empty($data)) return $data;
	else return showTemplate("На этой странице нету контента...", "message_2", true);
}

function giveTheListOfNews()
{
	$db = connectionToTheDatabase();
	$sql = 'SELECT * FROM news ORDER BY id DESC';
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
	$author = (isset($_SESSION['session_username'])) ? $_SESSION['session_username'] : '';
	if (isset($_POST['append'])) {
		if (!empty($_POST['caption']) && !empty($_POST['description']) && !empty($_POST['date'])) {
			$caption = $_POST['caption'];
			$description = $_POST['description'];
			$date = $_POST['date'];
			$categoryID = $_POST['categories'];
			$activism = 'Y';

			if (!empty($_FILES['picture']['name'])) {
				$path = 'img/';
				$tmp_path = 'tmp/';
				$types = array('image/gif', 'image/png', 'image/jpeg');
				$size = 1024000; // 1024000


				$names = explode('.', $_FILES['picture']['name']);
				$ext = array_pop($names);
	  		$_FILES['picture']['name'] = date('d.m.Y').'.'.time().'.'.$ext;
	  		
	  		if (!in_array($_FILES['picture']['type'], $types)) {
	  			return array('mes' => 'Запрещённый тип файла.', 'active' => 'false');
	  		}
	  		
	  		if ($_FILES['picture']['size'] > $size) {
	  			return array('mes' => 'Слишком большой размер файла.', 'active' => 'false');
	  		}
	  		
	 			if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])) {
	  			return array('mes' => 'Что-то пошло не так', 'active' => 'false');
	  		} else {
	 				$mes = 'Загрузка удачна';
	  		}

				$sql = 'INSERT INTO news (picture, caption, description, date, category_id, author, activism) VALUES(:picture, :caption, :description, :date, :category_id, :author, activism)'; 
				$picture = 'img/'.$_FILES['picture']['name'];

				$data = $db->prepare($sql);
				$data->bindParam(':picture', $picture, PDO::PARAM_STR);
				$data->bindParam(':caption', $caption, PDO::PARAM_STR);
				$data->bindParam(':description', $description, PDO::PARAM_STR);
				$data->bindParam(':date', $date);
				$data->bindParam(':category_id', $categoryID);
				$data->bindParam(':author', $author);
				$data->bindParam(':activism', $activism);
				$res = $data->execute();
  		} else {
  			$sql = 'INSERT INTO news (caption, description, date, category_id, author, activism) VALUES(:caption, :description, :date, :category_id, :author, :activism)';
				$picture = 'img/'.$_FILES['picture']['name'];

				$data = $db->prepare($sql);
				$data->bindParam(':caption', $caption, PDO::PARAM_STR);
				$data->bindParam(':description', $description, PDO::PARAM_STR);
				$data->bindParam(':date', $date);
				$data->bindParam(':category_id', $categoryID);
				$data->bindParam(':author', $author);
				$data->bindParam(':activism', $activism);
				$res = $data->execute();	
  		}

  		if ($res) {
  			if (empty($mes)) {
					return array('mes' => 'Вы успешно отправили данные!', 'active' => 'true');
				}
				return array('mes' => 'Вы успешно отправили данные!', 'active' => 'true', 'mes_second' => $mes);
			} else {
				return array('mes' => 'Ошибка!', 'active' => 'false');
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
	$activism = 'Y';
	$sql = 'SELECT * FROM news WHERE category_id = :category_id AND activism = :activism ORDER BY id DESC LIMIT :start, :perpage';
	$statement = $db->prepare($sql);
	$statement->bindParam(':start', $start, PDO::PARAM_INT);
	$statement->bindParam(':perpage', $perpage, PDO::PARAM_INT);
	$statement->bindParam(':category_id', $category_id, PDO::PARAM_INT);
	$statement->bindParam(':activism', $activism, PDO::PARAM_STR);
	$statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_CLASS);
	if (!empty($data)) return $data;
	else return showTemplate("На этой странице нету контента...", "message_2", true);
}

function editNews($id)
{
	$db = connectionToTheDatabase();
	$uri = $_SERVER['REQUEST_URI'];
	$uri = substr($uri, 1, 5);
	if (isset($_POST['save'])) {
		if (!empty($_POST['caption']) && !empty($_POST['description']) && !empty($_POST['date'])) {
			
			$id = $_POST['id'];
			$caption = $_POST['caption'];
			$description = $_POST['description'];
			$date = $_POST['date'];
			$categoryID = $_POST['categories'];
			$activism = !empty($_POST['activism']) ? $_POST['activism'] : 'N';
			
		
			if (!empty($_FILES['picture']['name'])) {
				$path = 'img/';
				$tmp_path = 'tmp/';
				$types = array('image/gif', 'image/png', 'image/jpeg');
				$size = 1024000; // 1024000
				
				$uri = $_SERVER['REQUEST_URI'];
				$uri = substr($uri, 1, 5);
				if ($uri == 'admin') {
					$path = '../img/';	
				}

				$names = explode('.', $_FILES['picture']['name']);
				$ext = array_pop($names);
	  		$_FILES['picture']['name'] = date('d.m.Y').'.'.time().'.'.$ext;
	  		
	  		if (!in_array($_FILES['picture']['type'], $types)) {
	  			return array('mes' => 'Запрещённый тип файла.', 'active' => 'false');
	  		}
	  		
	  		if ($_FILES['picture']['size'] > $size) {
	  			return array('mes' => 'Слишком большой размер файла.', 'active' => 'false');
	  		}
	  		
	 			if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])) {
	  			return array('mes' => 'Что-то пошло не так', 'active' => 'false');
	  		} else {
	 				$mes = 'Загрузка удачна';
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
  			$sql = 'UPDATE news SET activism = :activism, caption = :caption, description = :description, date = :date, category_id = :category_id  WHERE id = :id';
				$picture = 'img/'.$_FILES['picture']['name'];

				$data = $db->prepare($sql);
				$data->bindParam(':activism', $activism, PDO::PARAM_STR);
				$data->bindParam(':caption', $caption, PDO::PARAM_STR);
				$data->bindParam(':description', $description, PDO::PARAM_STR);
				$data->bindParam(':date', $date);
				$data->bindParam(':id', $id, PDO::PARAM_INT);
				$data->bindParam(':category_id', $categoryID);
				$res = $data->execute();	
  		}

			

			if ($res) {
				if (empty($mes)) {
					if ($uri == 'admin') {
						header("location: /admin/");
					} else {
						header("location: /");
					}
					return array('mes' => 'Вы успешно отправили данные!', 'active' => 'true');
				} else {
					if ($uri == 'admin') {
						header("location: /admin/");
					} else {
						header("location: /");
					}
					return array('mes' => 'Вы успешно отправили данные!', 'active' => 'true', 'mes_second' => $mes);	
				}
				
			} else {
				return array('mes' => 'Ошибка!', 'active' => 'false');
			}
		}
	}

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
		$uri = $_SERVER['REQUEST_URI'];
		$uri = substr($uri, 1, 5);
		$data = $db->prepare('DELETE FROM news WHERE id = :id');
  	$data->bindParam(':id', $id);
  	$res = $data->execute();	
  	if ($res) {
  		
				if (array_key_exists('delete_file', $_POST)) {
				  $filename = $_POST['delete_file'];
				  if (file_exists($filename)) {
				    unlink($filename);
				    if ($uri == 'admin') {
							header("location: /admin/");
						} else {
							header("location: /");
						}
				    //echo 'File '.$filename.' has been deleted';
				  } else {
				  	if ($uri == 'admin') {
							header("location: /admin/");
						} else {
							header("location: /");
						}
				    //echo 'Could not delete '.$filename.', file does not exist';
				  }
				}
				return true;

  		header("location: /");	
  	}
	} 
}
