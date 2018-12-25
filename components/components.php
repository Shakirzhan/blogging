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

function displayTheTemplate($folder, $res, $data)
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

function getPaginationData()
{
	$perpage = 2;
	if (isset($_GET['page']) & !empty($_GET['page'])) {
		$curpage = $_GET['page'];
	} else {
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