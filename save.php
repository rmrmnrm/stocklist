<?php
	require_once(dirname(__FILE__).'/core/functions.php');

	if(!isset($_POST)){
		$ErrorMessage = "データの送信に失敗しました。";
	}else{
		try {
			// データベースに接続
			$db = getDB();
			
			if(empty($_POST['itemid'])){
				$result = insertItemdata($db, $_POST);
			}else{
				$result = updateItemdata($db, $_POST);
			}
		} catch (PDOException $e) {
			print "エラーメッセージ：{$e->getMessage()}";
		}

	// Webブラウザにこれから表示するものがUTF-8で書かれたHTMLであることを伝える
	// (これか <meta charset="utf-8"> の最低限どちらか1つがあればいい． 両方あっても良い．)
	header('Content-Type: text/html; charset=utf-8');

	}





?>