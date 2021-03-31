<?php
require_once('base.php');

/**
 * アカウント一覧出力クラス
 */
class AccountExport extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            $rows = $this-> model-> getAccountList();

            if(count($rows) != 0)
            {
                $file_name = "account_list.csv";
                $fp = fopen('php://output', 'w');

                $header = array("ID", "ユーザ名", "権限");
                fputcsv($fp, $header, ',', '"');

                foreach ($rows as $row)
                {
                    $line = array($row['id'], $row['name'], $row['authority']);
                    fputcsv($fp, $line, ',', '"');
                }

                fclose($fp);
                header('Content-Type: application/octet-stream');
                header("Content-Disposition: attachment; filename={$file_name}");
                header('Content-Transfer-Encoding: binary');
                exit;
            }

            header('Location: accountList.php');
        }
        catch(Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new AccountExport();

 ?>
