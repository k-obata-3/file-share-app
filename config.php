<?php
// フォルダ関連定数
define('TEMPLATES_DIR', 'templates/');
define('TEMPLATES_C_DIR', 'templates_c/');
define('UPLOAD_DIR', 'uploadContainer');

// DB関連定数
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'file_share_app');
define('DB_HOST', '%');
define('TABLE_NAME', 'account');

// テンプレート関連定数
// 共通
define('TPL_NAME', 'tpl_name');
define('MAIN_VIEW', 'mainView.tpl');
define('TITLE', 'title');
define('NAV_BTN_TYPE', 'nav_btn_type');
// テンプレート名
define('LOGIN_VIEW', 'loginView');
define('SIGNUP_VIEW', 'signupView');
define('FILE_LIST_VIEW', 'fileListView');
define('USER_INFO_EDIT_VIEW', 'userInfoEditView');
define('ACCOUNT_LIST_VIEW', 'accountListView');
// タイトル
define('TITLE_LOGIN', 'ログイン');
define('TITLE_SIGNUP', 'サインアップ');
define('TITLE_FILE_LIST', 'ファイル一覧');
define('TITLE_USER_INFO_EDIT', 'ユーザ情報編集');
define('TITLE_ACCOUNT_LIST', 'アカウント一覧');

// ナビゲーションバー ボタンタイプ
define('NAV_BTN_FORWARD_SIGNUP', 1);
define('NAV_BTN_BACK_FILE_LIST', 2);
define('NAV_BTN_LOGOUT', 3);
define('NAV_BTN_BACK_LOGIN', 4);
 ?>
