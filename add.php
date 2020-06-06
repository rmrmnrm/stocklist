<?php
	require_once(dirname(__FILE__).'/core/functions.php');
	$item = array('ID'=>'','category_id'=>'','itemname'=>'','number'=>'');
	if(isset($_GET['itemid'])){
		$db = getDB();
		$Itemdata = getItemData($db , $_GET['itemid']);
		while ($row = $Itemdata->fetch()){
			$item = $row;
		}
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stock List</title>
	<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<header>
		<nav class="navbar navbar-dark bg-dark">
			<a href="/" class="navbar-brand">Stock List</a>
			<a class="btn btn-light" href="javascript:history.back();" role="button">↩</a>
		</nav>
	</header>
	<main>
		<form action="/save.php" method="post">
			<table class="table table-striped">
				<tbody>
					<tr class="form-group">
						<th>アイテム名</th>
						<td>
							<input type="text" name="itemname" class="form-control" value="<?php echo $item['itemname'];?>" required>
						</td>
					</tr>
					<tr class="form-group">
						<th>個数</th>
						<td>
							<input type="number" name="itemnumber" class="form-control" value="<?php echo $item['number'];?>" required>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="col text-center">
				<input type="hidden" name="itemid" value="<?php echo $item['ID'];?>">
				<button type="submit" class="btn btn-primary mb-2">追加</button>
			</div>
		</form>
	</main>
</body>
	<script src="//code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="/js/common.js"></script>
<script>
</script>
</html>