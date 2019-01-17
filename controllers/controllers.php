<?php
/**
 * Для вывода массива используйте debug(переменная);
 */
/**
 * Выводит все записи
 * @return [boolean] [возвращает просто true]
 */
function displayEntries()
{
	/**
	 * [$categories массив с категориями]
	 * пример 
	 * [0] => Array
        (
            [id] => 1
            [name] => Финансы
        )
	 * @var [array]
	 */
	$categories = getCategoriesList();
	/**
	 * [$data параметры постраничной навигации]
	 * пример 
	 * Array
			(
			    [start] => 0
			    [perpage] => 2
			    [curpage] => 1
			    [startpage] => 1
			    [previouspage] => 0
			    [endpage] => 3
			    [nextpage] => 2
			)
	 *
	 * @var [array]
	 */
	$data = getPaginationData();
	
	/**
	 * [$action Получает GET параметры]
	 * @var [string]
	 */
	$action = getAction();
	/**
	 * [$count общее кол-во новостей]
	 * @var [string]
	 */
	$count = countingRecords($action);

	$data['page'] = false;
	if ($count > 2) { $data['page'] = true; }
	/**
	 * [$res Содержит две новости]
	 * $data['start'] начальная страница
	 * $data['perpage'] текущая страница
	 * пример 
	 * [0] => stdClass Object
        (
            [id] => 59
            [picture] => 
            [caption] => Момент взрыва в сирийском Манбидже попал на видео
            [description] => Ранее стало известно.........
            [love] => 0
            [comments] => 0
            [date] => 2019-01-16
            [category_id] => 3
            [author] => admin
            [activism] => Y
        )
	 * @var [object]
	 */
	$res = getAllRecords($data['start'], $data['perpage']);
	/**
	 * displayTheTemplateNewParameter(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplateNewParameter('blogging', $res, $data, $categories, array());
	return true;
}
/**
 * [outputOneNews Выводит одну запись]
 * @return [boolean] [возвращает просто true]
 */
function outputOneNews()
{
	/**
	 * [$item номер новости]
	 * @var [string]
	 */
	if (isset($_GET['item'])) { $item = $_GET['item']; } 
	else { $item = 1; }

	/**
	 * [$res массив содержит одну новость]
	 * пример 
	 * Array
		(
		    [id] => 59
		    [picture] => 
		    [caption] => Момент взрыва в сирийском Манбидже попал.......
		    [love] => 0
		    [comments] => 0
		    [date] => 2019-01-16
		    [category_id] => 3
		    [author] => admin
		    [activism] => Y
		)
	 * @var [array]
	 */
	$res = getOneNews($item);
	/**
	 * [$categories список категорий]
	 * пример 
	 * Array
	  (
	      [id] => 1
	      [name] => Финансы
	  )
	 * @var [array]
	 */
	$categories = getCategoriesList();
	/**
	 * displayTheTemplate(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplate('item', $res, $categories);
	return true;
}
/**
 * [registration функция выводит форму регистрации]
 * @return [boolean] [возвращает просто true]
 */
function registration()
{
	/**
	 * [$res показывает сообщение пользователю]
	 * @var [string]
	 */
	$res = weGetNewUser();
	/**
	 * displayTheTemplate(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplate('registration', $res, array());
	return true;
}
/**
 * [login функция выводит форму входа]
 * @return [boolean] [возвращает просто true]
 */
function login()
{
	/**
	 * [$res показывает сообщение пользователю]
	 * @var [string]
	 */
	$res = singleUserRegistration();
	/**
	 * displayTheTemplate(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplate('login', $res, array());
	return true;
}
/**
 * [addForm выводит форму добавления новостей]
 */
function addForm()
{
	/**
	 * [$categories список категорий]
	 * пример  
	 * Array
	  (
	      [id] => 1
	      [name] => Финансы
	  )
	 * @var [array]
	 */
	$categories = getCategoriesList();
	
	$res = array();
	/**
	 * [$res сообщение показывается пользователю]
	 * @var [array]
	 */
	$res = AddNews();
	/**
	 * displayTheTemplate(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplate('append', $res, $categories);
	return true;
}
/**
 * [editForm выводит форму редактирования]
 * @return [boolean] [возвращает просто true]
 */
function editForm()
{
	/**
	 * [$item номер новости]
	 * @var [string]
	 */
	if (isset($_GET['itemID'])) { $item = $_GET['itemID']; } 
	else { $item = 1; }
	/**
	 * [$resNews содержит одну новость]
	 * пример 
	 * Array
		(
		    [id] => 62
		    [picture] => 
		    [caption] => Момент взрыва в сирийском........
		    [love] => 0
		    [comments] => 0
		    [date] => 2019-01-16
		    [category_id] => 3
		    [author] => admin
		    [activism] => Y
		)
	 * @var [array]
	 */
	$resNews = getOneNews($item);
	/**
	 * [$categories список категорий]
	 * пример 
	 * Array
	  (
	      [id] => 1
	      [name] => Финансы
	  )
	 * @var [array]
	 */
	$categories = getCategoriesList();
	/**
	 * [$res сообщение показывается пользователю]
	 * @var [array]
	 */
	$res = editNews($item);
	/**
	 * newParameterConnectTemplate(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	newParameterConnectTemplate('edit', $res, $resNews, $categories);
	return true;
}
/**
 * [showNewsByCategory выводит все новости по категории]
 * @return [boolean] [возвращает просто true]
 */
function showNewsByCategory()
{
	/**
	 * [$categoryID номер категории]
	 * @var [string]
	 */
	$categoryID = isset($_GET['categoryID']) ? $_GET['categoryID'] : '';
	/**
	 * [$categories список категорий]
	 * пример 
	 * Array
    (
        [id] => 1
        [name] => Финансы
    )
	 * @var [array]
	 */
	$categories = getCategoriesList();
	/**
	 * [$data параметры постраничной навигации]
	 * пример 
	 * Array
		(
		    [start] => 0
		    [perpage] => 2
		    [curpage] => 1
		    [startpage] => 1
		    [previouspage] => 0
		    [endpage] => 1
		    [nextpage] => 2
		)
	 * @var [array]
	 */
	$data = getPaginationDataNewParameter($categoryID);
	/**
	 * [$action Параметр $_GET]
	 * @var [string]
	 */
	$action = getAction();
	/**
	 * [$count общее кол-во новостей в категории]
	 * @var [string]
	 */
	$count = countingRecords($action, $categoryID);
	$data['category'] = false;
	if ($count > 2) { $data['category'] = true; }
	/**
	 * [$res содержит все новсти по категории]
	 * пример 
	 * Object
	  (
	      [id] => 53
	      [picture] => 
	      [caption] => Момент взрыва в сирийском Манбидже.....
	      [love] => 0
	      [comments] => 0
	      [date] => 2019-01-16
	      [category_id] => 2
	      [author] => admin
	      [activism] => Y
	  )
	 * @var [object]
	 */
	$res = getNewsUnderCategories($data['start'], $data['perpage'], $categoryID);
	/**
	 * displayTheTemplateNewParameter(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplateNewParameter('blogging', $res, $data, $categories, $categoryID);
}
/**
 * [displayNewsList все новости]
 * @return [boolean] [возвращает просто true]
 */
function displayNewsList() 
{
	/**
	 * [$res содержит все новости]
	 * пример 
	 * Object
	  (
	      [id] => 62
	      [picture] => 
	      [caption] => Момент взрыва в сирийском Манбидже...
	      [love] => 0
	      [comments] => 0
	      [date] => 2019-01-16
	      [category_id] => 3
	      [author] => admin
	      [activism] => Y
	  )
	 * @var [object]
	 */
	$res = giveTheListOfNews();
	/**
	 * displayTheTemplateAdmin(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	displayTheTemplateAdmin('list', $res, array());
	return true;
}
/**
 * [editFormAdmin одна новость для редактирования в админке]
 * @return [boolean] [возвращает просто true]
 */
function editFormAdmin() 
{
	/**
	 * [$item номер новости]
	 * @var [string]
	 */
	$item = (!empty($_GET['itemID'])) ? $_GET['itemID'] : '';
	/**
	 * [$resNews содержит в себе одну новость]
	 * пример 
	 * Array
		(
		    [id] => 62
		    [picture] => 
		    [caption] => Момент взрыва в сирийском Манбидже.....
		    [love] => 0
		    [comments] => 0
		    [date] => 2019-01-16
		    [category_id] => 3
		    [author] => admin
		    [activism] => Y
		)
	 * @var [array]
	 */
	$resNews = getOneNews($item);
	/**
	 * [$categories список категорий]
	 * пример 
	 * Array
    (
        [id] => 1
        [name] => Финансы
    )
	 * @var [array]
	 */
	$categories = getCategoriesList();
	/**
	 * [$res сообщение показывается пользователю]
	 * @var [array]
	 */
	$res = editNews($item);
	/**
	 * newParameterConnectTemplateAdmin(параметры) подключает шаблон
	 * находится эта функция в
	 * путь /components/components.php
	 */
	newParameterConnectTemplateAdmin('edit', $res, $resNews, $categories);
	return true;
}