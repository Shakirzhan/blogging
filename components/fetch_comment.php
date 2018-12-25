<?php


require_once('../config/db_params.php');
require_once('../components/components.php');


function getTemplate($name) {
    ob_start(); // Начинаем сохрание выходных данных в буфер
    include ('../tmpl/'.$name.".tpl"); // Отправляем в буфер содержимое файла
    $text = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
    return $text; // Возвращение текста из файла
}



$db = connectionToTheDatabase();



$itemID = isset($_POST['itemID']) ? $_POST['itemID'] : '';



$query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '0' and itemID = $itemID ORDER BY comment_id DESC";
$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
	
$output = '';
foreach($result as $row) {
      $output .= str_replace(
          array(
            '$comment_sender_name$',
            '$comment$',
            '$date$',
            '$comment_id$'
          ),
          array (
            $row["comment_sender_name"],
            $row["comment"],
            $row["date"],
            $row["comment_id"]
          ),
          getTemplate("comment")
      );
		$output .= get_reply_comment($db, $row["comment_id"]);
	}

echo $output;

function get_reply_comment($db, $parent_id = 0, $marginleft = 0) {
    $query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'";
    $output = '';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if ($parent_id == 0) {
    	$marginleft = 0;
    } else {
        $marginleft = $marginleft + 48;
    }
    if ($count > 0) {
        foreach($result as $row) {
            $output .= str_replace(
                array(
                  '$comment_sender_name$',
                  '$comment$',
                  '$date$'
                ),
                array (
                  $row["comment_sender_name"],
                  $row["comment"],
                  $row["date"]
                ),
                getTemplate("comment_children")
            );
            
            $output .= get_reply_comment($db, $row["comment_id"], $marginleft);
        }
     }
    return $output;
}

