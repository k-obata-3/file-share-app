<!-- ユーザ情報編集 -->
<div>
	<form name="userInfoEditForm" action="userInfoEdit.php" method="post" onsubmit="return onInputValid()" autocomplete="off">
		<div class="col-md-6 offset-md-3" id="container">
			<div class="card rounded-0">
				<div class="card-body col-md-10 offset-md-1">
					<center><h3>ユーザ情報編集</h3></center>
					<div class="form-group">
						<label class="col-form-label">ユーザID</label>
						<input type="text" class="form-control" name="user_id" value="">
					</div>
					<div class="form-group">
						<label class="col-form-label">パスワード</label>
						<input type="password" class="form-control" name="password" value="">
					</div>
				</div>
			</div>
			<center>
				{$message}
			</center>
		</div>
		<div class="col-md-2 offset-md-5">
			<button type="submit" class="btn-block btn-secondary btn-lg">変更</button>
		</div>
	</form>
</div>

<style>

</style>

<script type="text/javascript">
	function onInputValid()
	{
		var name = document.forms.userInfoEditForm.elements['user_id'];
		var pass = document.forms.userInfoEditForm.elements['password'];
		if(name.value == "" || pass.value == "")
		{
			$('#err-modal').modal('show');
			return false;
		}

		// pass.value = hex_md5(pass.value);
		document.forms.userInfoEditForm.submit();
		return true;
	}

	function toFileList()
	{
		location.href = 'fileList.php';
	}
</script>
