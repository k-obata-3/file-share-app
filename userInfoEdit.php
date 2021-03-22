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
            if(isset($_POST['name']) && isset($_POST['password']))
            {
                $rows = $this-> model-> getUniqueAccount($_POST['name'], $_SESSION['id']);

                if(count($rows) != 0)
                {
                    $this-> message = 'ユーザ名は既に使用されています。';
                }
                else
                {
                    $this-> model-> updateAccountInfo($_POST['name'], $_POST['password'], $_SESSION['id']);

                    $_SESSION['name'] = $_POST['name'];

                    $this-> message = '変更しました。';
                }
            }

            $this-> smarty-> assign('message',$this-> message);
            $this-> smarty-> display(USER_INFO_EDIT_VIEW);
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
