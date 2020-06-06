<?php
	require_once(dirname(__FILE__).'/core/functions.php');
	$items = '';
	// データベースに接続
	$db = getDB();
	// データ取得
	$rows = getItemData($db);
/*	while ($row = $rows->fetch()) {
		$items = $items."{ ID: '".$row['ID']."', name: '".$row['itemname']."', number: ".$row['number']." },";
	}*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stock List</title>
	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

</head>
<body>
	<header>
		<nav class="navbar navbar-dark bg-dark">
			<a href="/" class="navbar-brand">Stock List</a>
			<a class="btn btn-light" href="/add.php" role="button">+</a>
		</nav>
	</header>
	<main id="app">
<!--		<b-table striped hover caption-top
			:items="[<?php echo $items;?>
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
			<template v-slot:cell(name)="data">
				<router-link to="'/add.php?itemid='+'${data.item.ID}'+'">'${data.item.name}'</router-link>
				<input :value="`${data.item.number}`" :name="'number['+'${data.item.ID}'+']'">
			</template>
		</b-table>
-->
		<table class="table table-striped">
		<thead>
				<tr>
					<th>アイテム名</th>
					<th>個数</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while ($row = $rows->fetch()) {
					echo '<tr>
					<td><a href="/add.php?itemid='.$row['ID'].'">'.$row['itemname'].'</a></td>
					<td>'.$row['number'].'</td>
				</tr>';
				}
			?>
			</tbody>
		</table>
	</main>
</body>
	<script src="//code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<!-- Load Vue followed by BootstrapVue -->
	<script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
	<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

	<!-- Load the following for BootstrapVueIcons support -->
	<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>

	<script src="/js/common.js"></script>

<script>
</script>
</html>