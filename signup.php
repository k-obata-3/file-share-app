<?php
require_once('base.php');

/**
 * サインアップクラス
 */
class Signup extends Base
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

                if(count($rows) != 0)
                {
                    $this-> message = USER_ID_UNIQUE_ERROR_MESSAGE;
                }
                else
                {
                    $this-> model-> insertAccount($_POST['user_id'], $this-> util-> getHashText($_POST['password']), 2);
                    $this-> message = REGISTRATION_SUCCESSFUL_MESSAGE;
                }
            }

            $this-> smarty-> assign('message',$this-> message);
            $this-> smarty-> assign(TPL_NAME, SIGNUP_VIEW);
            $this-> smarty-> assign(TITLE, TITLE_SIGNUP);
            $this-> smarty-> assign(NAV_BTN_TYPE, NAV_BTN_BACK_LOGIN);
            $this-> smarty-> assign(ERR_MODAL_MESSAGE, INPUT_ERROR_MESSAGE);
        }
        catch (Exception $e)
        {
            $this-> model-> pdo-> rollBack();
            printf($e-> getMessage());
        }
    }
}
new Signup();

?>
