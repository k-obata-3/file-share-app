<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ファイル一覧</title>

		<link rel="stylesheet" href="library/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="library/common.css">
		<script src="library/jquery-3.6.0.js"></script>
		<script src="library/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
		<script src="./js/common.js"></script>
	</head>
	<body id="common-body">
		<nav class="navbar navbar-dark bg-dark">
			<span class="navbar-brand">ファイル共有システム</span>
			<div>
				<button type="button" class="btn btn-sm btn-outline-light" onclick="callLogout()">ログアウト</button>
			</div>
		</nav>

		<div class="col-md-12 text-right" id="user-info-container">
			<form id="upload-form" method="post" action="fileUploader.php" enctype="multipart/form-data">
				<input type="file" name="up-file">
				<button type="submit" class="btn btn-sm btn-info" id="upload-btn">アップロード</button>
			</form>
			{if $authority == 1}
				<!-- 管理者アカウントの場合 -->
				<button type="button" class="btn btn-light" onclick="toAccountList()">アカウント一覧</button>
			{/if}
			<button type="button" class="btn btn-light" onclick="toUserInfoEdit()"><img src="resource/person-circle.svg">&nbsp;{$user_id}&nbsp;</button>
		</div>

		<div class="col-md-10 offset-md-1" id="file-table">
			<form name="file-form" method="post">
				<table class="table table-striped table-bordered table-light">
					<thead class="thead-dark">
						<tr>
							<th width="5%" scope="col"></th>
							<th width="5%" scope="col">No</th>
							<th width="50%" scope="col">ファイル名</th>
							<th width="20%" scope="col">サイズ[byte]</th>
							<th width="20%" scope="col">更新日時</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$list item=file name=fileTable}
						<tr>
							<td id="check-box"><input type="checkbox" name="file[]" value="{$file['name']}"></td>
							<td>{$smarty.foreach.fileTable.index + 1}</td>
							<td><a href="{$file['path']}" download="{$file['name']}">{$file['name']}</a></td>
							<td>{$file['size']}</td>
							<td>{$file['udDate']}</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
				<div class="text-left">
					<button type="button" class="btn btn-sm btn-light" id="slected-btn">全選択</button>
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-sm btn-danger" id="delete-btn" formaction="fileDelete.php">削除</button>
				</div>
			</form><br/>
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

#file-table td {
	vertical-align: middle;
}

#check-box {
	text-align: center;
}

#upload-form {
	display: inline-block;
	padding-right: 2rem;
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

	function toAccountList()
	{
		location.href = 'accountList.php';
	}
</script>
