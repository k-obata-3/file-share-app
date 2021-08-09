<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>ログイン</title>

		<link rel="stylesheet" href="library/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="library/common.css">
		<script src="library/jquery-3.6.0.js"></script>
		<script src="library/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
	</head>
	<body id="common-body">
		<nav class="navbar navbar-dark bg-dark">
  			<span class="navbar-brand">ファイル共有システム</span>
			<button type="button" class="btn btn-sm btn-outline-light" onclick="toSignupView()">サインアップ</button>
		</nav>
		<form name="loginForm" action="login.php" method="post" onsubmit="return onInputValid()" autocomplete="off">
			<div class="col-md-6 offset-md-3" id="container">
				<div class="card rounded-0">
					<div class="card-body col-md-10 offset-md-1">
						<center><h3>ログイン</h3></center>
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
				<button type="submit" class="btn-block btn-secondary btn-lg">ログイン</button>
			</div>
		</form>
	</body>
</html>

<style>

</style>

<script type="text/javascript">
	function toSignupView()
	{
		location.href = 'signup.php';
	}

	function onInputValid()
	{
		var id = document.forms.loginForm.elements['user_id'];
		var pass = document.forms.loginForm.elements['password'];
		if(id.value == "" || pass.value == "")
		{
			alert("ユーザIDまたはパスワードが未入力です。");
			return false;
		}

		pass.value = hex_md5(pass.value);
		document.forms.loginForm.submit();
		return true;
	}
</script>
