<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ファイル一覧</title>

		<link rel="stylesheet" href="library/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="library/common.css">
		<script src="library/jquery-3.6.0.js"></script>
		<script src="library/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
	</head>
	<body id="common-body">
		<nav class="navbar navbar-dark bg-dark">
			<span class="navbar-brand">ファイル共有システム</span>
			<button type="button" class="btn btn-sm btn-outline-light" id="border-less" onclick="toFileList()">ファイル一覧に戻る</button>
		</nav>

		<div class="col-md-4 offset-md-8 text-right" id="button-container">
			<form action="accountExport.php" method="post">
				<button type="submit" class="btn btn-light" name="account">CSV出力</button>
			</form>
		</div>

		<div class="col-md-10 offset-md-1" id="account-table">
			<table class="table table-striped table-bordered table-light">
				<thead class="thead-dark">
					<tr>
						<th width="5%" scope="col">No</th>
						<th width="55%" scope="col">ID</th>
						<th width="20%" scope="col">ユーザ名</th>
						<th width="20%" scope="col">権限</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$list item=account name=accountTable}
					<tr>
						<td>{$smarty.foreach.accountTable.index + 1}</td>
						<td>{$account['id']}</td>
						<td>{$account['name']}</td>
						<td>{$account['authority']}</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	</body>
</html>

<style>
#button-container {
	padding-top: 2rem;
}

#button-container .btn img {
	margin-top: -3px;
}

#account-table {
	margin-top: 2rem;
}

#account-table td {
	vertical-align: middle;
}

#check-box {
	text-align: center;
}
</style>

<script type="text/javascript">
	function callAccountExport()
	{
		location.href = 'accountExport.php';
	}

	function toFileList()
	{
		location.href = 'fileList.php';
	}
</script>
