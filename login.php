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
            if(isset($_POST['name']) && isset($_POST['password']))
            {
                $rows = $this-> model-> getLoginAccount($_POST['name'], $_POST['password']);

                if(count($rows) != 0)
                {
                    $_SESSION['login'] = TRUE;
                    $_SESSION['id'] = $rows[0]['id'];
                    $_SESSION['name'] = $rows[0]['name'];
                    $_SESSION['authority'] = $rows[0]['authority'];

                    header('Location: fileList.php');
                }
                else
                {
                    $this-> message = "ログインIDまたはパスワードに誤りがあります。";
                }
            }

            $this-> smarty-> assign('message',$this-> message);
            $this-> smarty-> display(LOGIN_VIEW);
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new Login();

?>
