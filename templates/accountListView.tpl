<!-- アカウント一覧 -->
<div>
	<div class="col-md-4 offset-md-8 text-right" id="button-container">
		<form action="accountExport.php" method="post">
			<button type="submit" class="btn btn-light" name="account">CSV出力</button>
		</form>
	</div>

	<div class="col-md-10 offset-md-1" id="account-table">
		<table class="table table-striped table-bordered table-light">
			<thead class="thead-dark">
				<tr>
					<th width="10%" scope="col">ID</th>
					<th width="70%" scope="col">ユーザID</th>
					<th width="20%" scope="col">権限</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$list item=account name=accountTable}
				<tr>
					<td>{$account['id']}</td>
					<td>{$account['user_id']}</td>
					<td>{$account['authority']}</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>

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
