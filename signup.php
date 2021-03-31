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
            if(isset($_POST['name']) && isset($_POST['password']))
            {
                $rows = $this-> model-> getUniqueAccount($_POST['name'], 0);

                if(count($rows) != 0)
                {
                    $this-> message = 'ユーザ名は既に使用されています。';
                }
                else
                {
                    $this-> model-> insertAccount($_POST['name'], $this-> util-> getHashText($_POST['password']), 1);
                    $this-> message = '登録しました。';
                }
            }

            $this-> smarty-> assign('message',$this-> message);
            $this-> smarty-> display(SIGNUP_VIEW);
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
