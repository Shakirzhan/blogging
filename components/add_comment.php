<?php
require_once('../config/db_params.php');
require_once('../components/components.php');
	
$db = connectionToTheDatabase();

$error = '';
$comment_email = '';
$comment_content = '';

if(empty($_POST["email"])) {
		$error .= '<p class="text-danger">Заполните поле email</p>';
} else {
		$comment_email = $_POST["email"];
}

if(empty($_POST["comment_content"])) {
		$error .= '<p class="text-danger">Комментарий обязателен</p>';
} else {
		$comment_content = $_POST["comment_content"];
}

if ($error == '') {
		$query = "INSERT INTO tbl_comment (parent_comment_id, comment, comment_sender_name, itemID) VALUES (:parent_comment_id, :comment, :comment_sender_name, :itemID)";
		$statement = $db->prepare($query);
		$statement->bindParam(':parent_comment_id', $_POST["comment_id"], PDO::PARAM_INT);
		$statement->bindParam(':comment', $comment_content, PDO::PARAM_STR);
		$statement->bindParam(':comment_sender_name', $comment_email, PDO::PARAM_STR);
		$statement->bindParam(':itemID', $_POST['itemID'], PDO::PARAM_INT);
		$res = $statement->execute();
		if ($res) {
			$error = '<label class="text-success">Комментарий добавлен</label>';
		} else {
			$error = '<label class="text-success">Комментарий не добавлен</label>';
		}
}

$data = array( 'error' => $error );

echo json_encode($data);