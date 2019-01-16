<?php

function connectionToTheDatabase()
{
	try {
  	$connect = new PDO(HOST, USERNAME, PASSWORD);
	} catch(PDOException $err) {
  	echo "Ошибка: не удается подключиться: " . $err->getMessage();
	}

	return $connect;
}
/**
 * Функция подключает шаблон
 * @param  [string]  $folder [- это название папки]
 * @param  [array]   $res    [здесь хранятся данные новостей]
 * @param  [array]   $data   [здесь хранятся данные о катигориях]
 * @return [boolean]         [true]
 */
function displayTheTemplate($folder, $res, $data)
{
	$template = ROOT.'/views/'.$folder.'/view.php';
	include_once($template);
	return true;
}

function newParameterConnectTemplate($folder, $res, $resNews, $data)
{
	$template = ROOT.'/views/'.$folder.'/view.php';
	include_once($template);
	return true;
}

function newParameterConnectTemplateAdmin($folder, $res, $resNews, $data)
{
	$template = '../views/admin/'.$folder.'/view.php';
	include_once($template);
	return true;
}

function displayTheTemplateNewParameter($folder, $res, $data, $categories, $categoryID)
{
	$template = ROOT.'/views/'.$folder.'/view.php';
	include_once($template);
	return true;
}

function displayTheTemplateAdmin($folder, $res, $data)
{
	$template = '../views/admin/'.$folder.'/view.php';
	include_once($template);
	return true;
}

function getAction() {
	return $action = (isset($_GET['action'])) ? $_GET['action'] : '';
}

function countingRecords($action, $categoryID = null) {
	$db = connectionToTheDatabase();
	switch ($action) {
		default:
		case 'page':
			$PageSql = 'SELECT COUNT(*) as count FROM news';
			$statement = $db->prepare($PageSql);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();
			$row = $statement->fetch();
			return $row['count'];
			break;
		case 'category':
			$PageSql = 'SELECT COUNT(*) as count FROM news WHERE category_id = :category_id';
			$statement = $db->prepare($PageSql);
			$statement->bindParam(':category_id', $categoryID, PDO::PARAM_INT);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();
			$row = $statement->fetch();
			return $row['count'];
			break;
	}
}

function getTotalRecords($categoryID) {
	$db = connectionToTheDatabase();
	$activism = 'Y';
	$PageSql = 'SELECT COUNT(*) as count FROM news WHERE category_id = :category_id AND activism = :activism';
	$statement = $db->prepare($PageSql);
	$statement->bindParam(':category_id', $categoryID, PDO::PARAM_INT);
	$statement->bindParam(':activism', $activism, PDO::PARAM_STR);
	$statement->setFetchMode(PDO::FETCH_ASSOC);
	$statement->execute();
	$row = $statement->fetch();
	return $row['count'];	
}

/**
 * Это функция отвечате за постраничную навигацию
 * @return [array] [description]
 */
function getPaginationData()
{
	/**
	 * [$perpage выводить две записи на страницу]
	 * @var integer
	 */
	$perpage = 2;
	if (isset($_GET['page']) & !empty($_GET['page'])) {
		$curpage = $_GET['page'];
	} else {
		/**
		 * [$curpage номер текущей страницы]
		 * @var integer
		 */
		$curpage = 1;
	}

	$db = connectionToTheDatabase();
	$start = ($curpage * $perpage) - $perpage;
	$PageSql = 'SELECT COUNT(*) as count FROM news';
	$statement = $db->prepare($PageSql);
	$statement->execute();
	$totalres = $statement->fetchColumn();
	$endpage = ceil($totalres / $perpage);
	$startpage = 1;
	$nextpage = $curpage + 1;
	$previouspage = $curpage - 1;

	return array('start' => $start,
							 'perpage' => $perpage, 
							 'curpage' => $curpage,
							 'startpage' => $startpage,
							 'previouspage' => $previouspage,
							 'endpage' => $endpage,
							 'nextpage' => $nextpage,
	);
}

function getPaginationDataNewParameter($categoryID)
{
	$perpage = 2;
	if (isset($_GET['page']) & !empty($_GET['page'])) {
		$curpage = $_GET['page'];
	} else {
		$curpage = 1;
	}

	$db = connectionToTheDatabase();
	$start = ($curpage * $perpage) - $perpage;
	$PageSql = 'SELECT COUNT(*) as count FROM news WHERE category_id = '.$categoryID;
	$statement = $db->prepare($PageSql);
	$statement->execute();
	$totalres = $statement->fetchColumn();
	$endpage = ceil($totalres / $perpage);
	$startpage = 1;
	$nextpage = $curpage + 1;
	$previouspage = $curpage - 1;

	return array('start' => $start,
							 'perpage' => $perpage, 
							 'curpage' => $curpage,
							 'startpage' => $startpage,
							 'previouspage' => $previouspage,
							 'endpage' => $endpage,
							 'nextpage' => $nextpage,
	);
}

function getMessage($name, $resolution = false) {
	ob_start(); // Начинаем сохрание выходных данных в буфер
	if ($resolution) { include ('tmpl/'.$name.".tpl"); } // Отправляем в буфер содержимое файла 
  else { include ('../tmpl/'.$name.".tpl"); } // Отправляем в буфер содержимое файла 
  $text = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
  return $text; // Возвращение текста из файла
}

function showTemplate($message, $messageTemplate, $resolution = false) {
	$output = str_replace(
      array(
        '$message$'
      ),
      array (
        $message
      ),
      getMessage($messageTemplate, $resolution)
  );

  return $output;
}

function debug($data) {
	echo '<pre>'.print_r($data, 1).'</pre>';
}