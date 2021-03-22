<?php
require_once('library/libs/Smarty.class.php');
require_once('config.php');
require_once('model.php');

/**
 * 基底クラス
 */
abstract class Base
{
    public $smarty;
    public $model;
    public $message = '';

    /**
     * コンストラクタ
     */
    function __construct()
    {
        try
        {
            $this-> smarty = new Smarty();
            $this-> smarty-> template_dir = TEMPLATES_DIR;
            $this-> smarty-> compile_dir  = TEMPLATES_C_DIR;

            setlocale(LC_ALL, 'ja_JP.UTF-8');
            date_default_timezone_set('Asia/Tokyo');

            session_start();

            $this-> model = new Model();

            if($this-> isAuth())
            {
                $this-> exec();
            }
            else
            {
                $this-> callLogin();
            }
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
		}
    }

    /**
     * 認証済みか
     */
    public function isAuth()
    {
        if(isset($_SESSION['login']) || strpos($_SERVER['SCRIPT_NAME'], 'login.php') || strpos($_SERVER['SCRIPT_NAME'], 'signup.php') || strpos($_SERVER['SCRIPT_NAME'], 'logout.php'))
        {
            return true;
        }

        return false;
    }

    /**
     * ログイン呼び出し
     */
    public function callLogin()
    {
        header('Location: login.php');
    }

    /**
     * メイン処理
     */
    public function exec()
    {
        // 継承先で定義
    }
}
?>
