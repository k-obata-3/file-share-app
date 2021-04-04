<?php
require_once('base.php');

/**
 * ファイルアップロードクラス
 */
class FileUploader extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            $tempfile = $_FILES['up-file']['tmp_name'];
            $filename = UPLOAD_DIR ."/" .$_FILES['up-file']['name'];

            if (is_uploaded_file($tempfile))
            {
                move_uploaded_file($tempfile , $filename );
            }

            header('Location: fileList.php');
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new FileUploader();

?>
