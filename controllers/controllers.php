<?php

function displayEntries()
{
	$categories = getCategoriesList();
	$data = getPaginationData();

	$action = getAction();
	$count = countingRecords($action);

	$data['page'] = false;
	if ($count > 2) { $data['page'] = true; }
	
	$res = getAllRecords($data['start'], $data['perpage']);
	displayTheTemplateNewParameter('blogging', $res, $data, $categories, array());
}

function outputOneNews()
{
	if (isset($_GET['item'])) { $item = $_GET['item']; } 
	else { $item = 1; }
	$res = getOneNews($item);
	$categories = getCategoriesList();
	displayTheTemplate('item', $res, $categories);
}

function registration()
{
	$res = weGetNewUser();
	displayTheTemplate('registration', $res, array());
}

function login()
{
	$res = singleUserRegistration();
	displayTheTemplate('login', $res, array());
}

function addForm()
{
	$categories = getCategoriesList();
	$res = array();
	$res = AddNews();
	displayTheTemplate('append', $res, $categories);
}

function editForm()
{
	if (isset($_GET['itemID'])) { $item = $_GET['itemID']; } 
	else { $item = 1; }
	$resNews = getOneNews($item);
	$categories = getCategoriesList();
	$res = editNews($item);
	newParameterConnectTemplate('edit', $res, $resNews, $categories);
}

function showNewsByCategory()
{
	$categoryID = isset($_GET['categoryID']) ? $_GET['categoryID'] : '';
	$categories = getCategoriesList();
	$data = getPaginationDataNewParameter($categoryID);
	


	$action = getAction();
	$count = countingRecords($action, $categoryID);


	$data['category'] = false;
	if ($count > 2) { $data['category'] = true; }

	$res = getNewsUnderCategories($data['start'], $data['perpage'], $categoryID);

	displayTheTemplateNewParameter('blogging', $res, $data, $categories, $categoryID);
}

function displayNewsList() 
{
	$res = giveTheListOfNews();
	displayTheTemplateAdmin('list', $res, array());
}

function editFormAdmin() 
{
	$item = (!empty($_GET['itemID'])) ? $_GET['itemID'] : '';
	$resNews = getOneNews($item);
	$categories = getCategoriesList();
	$res = editNews($item);
	newParameterConnectTemplateAdmin('edit', $res, $resNews, $categories);
}