<?php
/* 参考
	https://qiita.com/yusuke_ten/items/4103f032dd0c6fbe5607
	https://qiita.com/h-naito/items/3a72828c31ad88a72ad5
	https://qiita.com/ntm718/items/e0c8ed27e5272b370689
	https://utsu-programmer.com/environment/laravel-setting-public/

	エックスサーバーのSSH接続ができない（問い合わせ済み、再度検証しなきゃ）
	Laravelをインストールしたが、シンボリックリンクがうまく行かないためドキュメントルートをLaravelに向けられない

	Laravel諦めて見た目だけvue.jsとBootstrapでつくってDBはPHPで呼び出すしかないかなあ～だせえ～

*/

	require_once(dirname(__FILE__).'/core/config.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Load required Bootstrap and BootstrapVue CSS -->
	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

</head>
<body>
	<div id="app">
		<b-table striped hover caption-top
			label="Table Options"
			:items="[
				{ age: 40, name: 'admin1', email: 'hoge@for.jp' },
				{ age: 21, name: 'admin2', email: 'huga@for.jp' },
				{	age: 89, name: 'admin3', email: 'piyo@for.jp' },
				{	age: 38, name: 'admin4', email: 'aaaaa@for.jp' }
			]"
			:fields="[
				{
					key: 'name',
					label: 'Name'
				},
				{
					key: 'email',
					label: 'Email'
				},
				{
					key: 'age',
					label: 'Old'
				}
			]"
		>
			<template v-slot:table-caption>表サンプル</template>
		</b-table>



		<hr>

		<b-table striped hover caption-top
			:items="[
				{ ID: 40, name: 'admin1', number: 1 },
				{ ID: 21, name: 'admin2', number: 2 },
				{ ID: 89, name: 'admin3', number: 3 },
				{ ID: 38, name: 'admin4', number: 4 }
			]"
			:fields="[
				{
					key: 'name',
					label: 'アイテム名',
					sortable: true
				},
				{
					key: 'number',
					label: '個数',
					sortable: true
				}
			]"
		>
			<template v-slot:table-caption>リンクとソート機能付き</template>
			<template v-slot:cell(number)="data">
				<input :value="`${data.item.number}`" :name="'number['+'${data.item.ID}'+']'">
			</template>
		</b-table>
	</div>
</body>
	<!-- Load Vue followed by BootstrapVue -->
	<script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
	<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

	<!-- Load the following for BootstrapVueIcons support -->
	<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>

	<script src="/js/common.js"></script>
<script>
</script>
</html>