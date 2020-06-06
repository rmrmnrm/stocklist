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

function getItemData($db,$id="") {
	//select命令の実行
	if(!empty($id)){
		$stt = $db->prepare('SELECT * FROM Item_List WHERE (ID = ?)');	
		$stt->bindValue(1, $id);
	}else{
		$stt = $db->query('SELECT * FROM Item_List ORDER BY ID ASC');
	}
	$stt->execute();

	return $stt;
}

function insertItemdata($db ,$data) {
	//insert命令を準備
	$stt = $db->prepare('INSERT INTO Item_List (itemname, number) VALUES (?, ?)');

	//insert命令の実行
	$stt->execute(array($data['itemname'],$data['itemnumber']));

}

function updateItemdata($db ,$data) {
	//update命令を準備
	$stt = $db->prepare('UPDATE Item_List SET itemname = ?, number = ? WHERE ID = ?');
	//insert命令の実行
	$stt->execute(array($data['itemname'],$data['itemnumber'],$data['itemid']));
	
}