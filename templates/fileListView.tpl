<!-- ファイル一覧 -->
<div>
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
		<form name="file-form" id="file-form" method="post" action="fileDelete.php">
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
						<td>{$file['name']}</td>
						<td>{$file['size']}</td>
						<td>{$file['udDate']}</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
			<div class="text-left">
				<button type="button" class="btn btn-sm btn-light" id="slected-btn">全選択</button>
				<button type="submit" class="btn btn-sm btn-success" id="download-btn" formaction="fileDownloader.php">ダウンロード</button>
			</div>
			<div class="text-right">
				<button type="button" class="btn btn-sm btn-danger" id="delete-btn" data-toggle="modal" onclick="modalOpen()">削除</button>
			</div>
		</form>
	</div>
</div>

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
	$(document).ready(function()
	{
		// ファイル削除 submit
		$('#conf-submit-modal #modal-yes').on('click', function()
		{
			modalClose();
			$('#file-form').submit();
		});
	});

	// 確認ダイアログ表示
	function modalOpen()
	{
		let checkItem = $(':checkbox[name="file[]"]:checked');
		if(checkItem.length != 0)
		{
			$('#conf-submit-modal').modal('show');
		}
	}

	// 確認ダイアログ非表示
	function modalClose()
	{
		$('#conf-submit-modal').modal('hide');
	}

	// ユーザ情報編集に遷移
	function toUserInfoEdit()
	{
		location.href = 'userInfoEdit.php';
	}

	// アカウント一覧に遷移
	function toAccountList()
	{
		location.href = 'accountList.php';
	}
</script>
