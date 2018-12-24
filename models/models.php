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