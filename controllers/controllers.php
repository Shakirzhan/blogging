<?php

function displayEntries()
{
	$categories = getCategoriesList();
	$data = getPaginationData();
	$data['page'] = true;
	$res = getAllRecords($data['start'], $data['perpage']);
	displayTheTemplateNewParameter('blogging', $res, $data, $categories, array());
}

function outputOneNews()
{
	if (isset($_GET['item'])) {
		$item = $_GET['item'];
	} else {
		$item = 1;	
	}
	$res = getOneNews($item);
	displayTheTemplate('item', $res, array());
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
	$res = AddNews();
	displayTheTemplate('append', $res, array());
}

function showNewsByCategory()
{
	$categoryID = isset($_GET['categoryID']) ? $_GET['categoryID'] : '';
	$categories = getCategoriesList();
	$data = getPaginationDataNewParameter($categoryID);
	$data['category'] = true;
	$res = getNewsUnderCategories($data['start'], $data['perpage'], $categoryID);
	displayTheTemplateNewParameter('blogging', $res, $data, $categories, $categoryID);
}