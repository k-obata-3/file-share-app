<?php
require_once('base.php');

/**
 * ログインクラス
 */
class Login extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            if(isset($_POST['user_id']) && isset($_POST['password']))
            {
                $rows = $this-> model-> findAccount($_POST['user_id']);
                if(count($rows) != 0 && $this-> util-> isVerifyHash($_POST['password'], $rows[0]['password']))
                {
                    $_SESSION['login'] = TRUE;
                    $_SESSION['id'] = $rows[0]['id'];
                    $_SESSION['user_id'] = $rows[0]['user_id'];
                    $_SESSION['authority'] = $rows[0]['authority'];

                    header('Location: fileList.php');
                }
                else
                {
                    $this-> message = ACCOUNT_ERROR_MESSAGE;
                }
            }

            $this-> smarty-> assign('message',$this-> message);
            $this-> smarty-> assign(TPL_NAME, LOGIN_VIEW);
            $this-> smarty-> assign(TITLE, TITLE_LOGIN);
            $this-> smarty-> assign(NAV_BTN_TYPE, NAV_BTN_FORWARD_SIGNUP);
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new Login();

?>
