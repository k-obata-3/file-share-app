<?php
require_once('base.php');

/**
 * ファイル削除クラス
 */
class FileDelete extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            if(!isset($_POST['file']))
            {
                header('Location: fileList.php');
            }

            $deleteFiles = $_POST['file'];

            if(count($deleteFiles) != 0)
            {
                foreach ($deleteFiles as $file)
                {
                    if(file_exists(UPLOAD_DIR ."/" .$file))
                    {
                        //ファイルを削除
                        unlink(UPLOAD_DIR ."/" .$file);
                    }
                }
            }

            header('Location: fileList.php');
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new FileDelete();

?>
