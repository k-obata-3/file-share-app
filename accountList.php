<?php
require_once('base.php');

/**
 * アカウント一覧クラス
 */
class AccountList extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            $rows = $this-> model-> getAccountList();

            $this-> smarty-> assign('authority',$_SESSION['authority']);
            $this-> smarty-> assign('list',$rows);

            $this-> smarty-> display(ACCOUNT_LIST_VIEW);
        }
        catch(Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new AccountList();

?>
