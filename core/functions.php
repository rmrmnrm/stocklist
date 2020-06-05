<?php
require_once(dirname(__FILE__).'/config.php');

function getDB() {
	$dsn = 'mysql:dbname='.DB_NAME;'host='.DB_HOST;'charset=utf8mb4';
	$usr = DB_USER;
	$passwd = DB_PASSWORD;

	//DBへの接続を確立
	$db = new PDO($dsn, $usr, $passwd);
	return $db;
}

function getItemData($db) {
	//select命令の実行
	$stt = $db->query('SELECT * FROM Item_List ORDER BY ID ASC');
	$stt->execte();
	$row = $stt->fetch(PDO::FETCH_ASSOC);

	return $row;
}

function insertItemdata($db ,$data) {
	//insert命令を準備
	$stt = $db->prepare('INSERT INTO Item_List(itemname, number) VALUES (?, ?)');

	//プレイスホルダに入力内容をセット
	$stt->bindValue(1, $data['itemname']);
	$stt->bindValue(2, $data['itemnumber']);

	//insert命令の実行
	$result = $stt->execute;

	return $result;
}

function updateItemdata($db ,$data) {
	//update命令を準備
	$stt = $db->prepare('UPDATE Item_List SET(itemname = ?, number = ?) WHERE (ID = ?)');

	//プレイスホルダに入力内容をセット
	$stt->bindValue(1, $_POST['itemname']);
	$stt->bindValue(2, $_POST['itemnumber']);
	$stt->bindValue(3, $_POST['itemid']);

	//insert命令の実行
	$result = $stt->execute;
	
	return $result;
}