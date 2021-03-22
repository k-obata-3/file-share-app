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
			<div>
				<button type="button" class="btn btn-sm btn-outline-light" onclick="callLogout()">ログアウト</button>
			</div>
		</nav>

		<div class="col-md-4 offset-md-8 text-right" id="user-info-container">
			<button type="button" class="btn btn-light" onclick="toUserInfoEdit()"><img src="resource/person-circle.svg">&nbsp;{$name}&nbsp;</button>
		</div>

		<div class="col-md-10 offset-md-1" id="file-table">
			<table class="table table-striped table-bordered table-light ">
			  <thead class="thead-dark">
			    <tr>
			      <th width="5%" scope="col"></th>
			      <th width="55%" scope="col">ファイル名</th>
			      <th width="20%" scope="col">サイズ[byte]</th>
			      <th width="20%" scope="col">更新日時</th>
			    </tr>
			  </thead>
			  <tbody>
				  {foreach from=$list item=file name=fileTable}
				    <tr>
				      <th scope="row">{$smarty.foreach.fileTable.index + 1}</p></th>
				      <td>{$file['name']}</td>
				      <td>{$file['size']}</td>
				      <td>{$file['udDate']}</td>
				    </tr>
				{/foreach}
			  </tbody>
			</table>
		</div>

	</body>
</html>

<style>
#user-info-container {
	padding-top: 2rem;
}

#user-info-container .btn img {
	margin-top: -3px;
}

#file-table {
	margin-top: 2rem;
}

</style>

<script type="text/javascript">
	function callLogout()
	{
		location.href = 'logout.php';
	}

	function toUserInfoEdit()
	{
		location.href = 'userInfoEdit.php';
	}
</script>
