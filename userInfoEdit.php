<?php
require_once('base.php');

/**
 * ユーザ情報編集クラス
 */
class UserInfoEdit extends Base
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

                if(count($rows) != 0 && $_SESSION['user_id'] != $rows[0]['user_id'])
                {
                    $this-> message = USER_ID_UNIQUE_ERROR_MESSAGE;
                }
                else
                {
                    $this-> model-> updateAccount($_POST['user_id'], $this-> util-> getHashText($_POST['password']), $_SESSION['id']);

                    $_SESSION['user_id'] = $_POST['user_id'];

                    $this-> message = REGISTRATION_SUCCESSFUL_MESSAGE;
                }
            }

            $this-> smarty-> assign('message',$this-> message);
            $this-> smarty-> assign(TPL_NAME, USER_INFO_EDIT_VIEW);
            $this-> smarty-> assign(TITLE, TITLE_USER_INFO_EDIT);
            $this-> smarty-> assign(NAV_BTN_TYPE, NAV_BTN_BACK_FILE_LIST);
            $this-> smarty-> assign(ERR_MODAL_MESSAGE, INPUT_ERROR_MESSAGE);
        }
        catch (Exception $e)
        {
            $this-> model-> pdo-> rollBack();
            printf($e-> getMessage());
        }
    }
}
new UserInfoEdit();

?>
