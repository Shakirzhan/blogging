<?php

function displayEntries()
{
	$data = getPaginationData();
	$res = getAllRecords($data['start'], $data['perpage']);
	displayTheTemplate('blogging', $res, $data);
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