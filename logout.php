<?php
require_once('base.php');

/**
 * ログアウトクラス
 */
class Logout extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            session_unset();
            $this-> callLogin();
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new Logout();

?>
