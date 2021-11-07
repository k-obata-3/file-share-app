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

            $this-> smarty-> assign(TPL_NAME, ACCOUNT_LIST_VIEW);
            $this-> smarty-> assign(TITLE, TITLE_ACCOUNT_LIST);
            $this-> smarty-> assign(NAV_BTN_TYPE, NAV_BTN_BACK_FILE_LIST);
        }
        catch(Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new AccountList();

?>
