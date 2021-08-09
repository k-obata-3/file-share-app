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
            $fileName = UPLOAD_DIR ."/" .$_FILES['up-file']['name'];
            // 一意のファイル名を取得
            $upFileName = $this-> getUniqueFileName($fileName);

            if (is_uploaded_file($tempfile))
            {
                move_uploaded_file($tempfile , $upFileName);
            }

            header('Location: fileList.php');
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }

    /**
     * 一意のファイル名を取得
     * 同名ファイル名が存在する場合は連番を付与
     */
    function getUniqueFileName($fileName)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $baseFileName = pathinfo($fileName, PATHINFO_FILENAME);

        $uniqueFileName = $fileName;
        $index = 2;
        while (file_exists($uniqueFileName))
        {
            // 連番を付与 [ファイル名]([連番]).[拡張子]
            $uniqueFileName = UPLOAD_DIR ."/" .$baseFileName .'(' .$index++ .')' .'.' .$extension;
        }

        return $uniqueFileName;
    }
}
new FileUploader();

?>
