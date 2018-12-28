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

function displayTheTemplateNewParameter($folder, $res, $data, $categories, $categoryID)
{
	$template = ROOT.'/views/'.$folder.'/view.php';
	include_once($template);
	return true;
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
		 * [$curpage текущая страница]
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

	$data = array();

	$data['start'] = $start;
	$data['perpage'] = $perpage;
	$data['curpage'] = $curpage;
	$data['startpage'] = $startpage;
	$data['previouspage'] = $previouspage;
	$data['endpage'] = $endpage;
	$data['nextpage'] = $nextpage;

	return $data;
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

	$data = array();

	$data['start'] = $start;
	$data['perpage'] = $perpage;
	$data['curpage'] = $curpage;
	$data['startpage'] = $startpage;
	$data['previouspage'] = $previouspage;
	$data['endpage'] = $endpage;
	$data['nextpage'] = $nextpage;

	return $data;
}