<html>
    <head>
        <meta charset="utf-8">
		<title>{$title}</title>

		<link rel="stylesheet" href="library/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="library/common.css">
		<script src="library/jquery-3.6.0.js"></script>
		<script src="library/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
		<script src="./js/common.js"></script>
    </head>
    <body id="common-body">
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand">ファイル共有システム</span>
            {if "$nav_btn_type" == 1}
                <button type="button" class="btn btn-sm btn-outline-light" onclick="toSignupView()">サインアップ</button>
            {elseif "$nav_btn_type" == 2}
                <button type="button" class="btn btn-sm btn-outline-light" id="border-less" onclick="toFileList()">ファイル一覧に戻る</button>
            {elseif "$nav_btn_type" == 3}
                <button type="button" class="btn btn-sm btn-outline-light" onclick="callLogout()">ログアウト</button>
            {elseif "$nav_btn_type" == 4}
                <button type="button" class="btn btn-sm btn-outline-light" id="border-less" onclick="toLogin()">ログインに戻る</button>
            {/if}
        </nav>
        <div>
            {include file="$tpl_name.tpl"}
        </div>
    </body>
</html>
