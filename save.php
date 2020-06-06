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

	header('Location: '.$SITE_URL);
	exit;
	

	}





?>