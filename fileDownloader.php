<?php
require_once('base.php');

/**
 * ファイルダウンロード処理クラス
 */
class FileDownloader extends Base
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

            $files = $_POST['file'];
            if(count($files) > 1)
            {
                $zipFile = UPLOAD_DIR ."/" ."download.zip";
                $zip = new ZipArchive();
                $result = $zip->open($zipFile, ZipArchive::CREATE);
                if($result === true)
                {
                    foreach ($files as $file)
                    {
                        // 文字コード変換
                        $f = mb_convert_encoding($file, "SJIS", "UTF-8");
                        // zipに追加
                        $zip->addFile(UPLOAD_DIR ."/" .$f);
                    }
                    $zip->close();
                    // zipファイルをダウンロード
                    $this->download($zipFile);
                }

                unlink($zipFile);
                exit;
            }
            else
            {
                // ファイルをダウンロード
                $this->download(UPLOAD_DIR ."/" .$files[0]);
                exit;
            }

            header('Location: fileList.php');
        }
        catch (Exception $e)
        {
            printf($e-> getMessage());
        }
    }

    /**
     * ダウンロード処理
     */
    function download($pPath, $pMimeType = null)
    {
        if (!is_readable($pPath))
        {
            die($pPath);
        }

        // Content-Typeとして送信するMIMEタイプ(第2引数を渡さない場合は自動判定)
        $mimeType = (isset($pMimeType)) ? $pMimeType　: (new finfo(FILEINFO_MIME_TYPE))->file($pPath);

        // 適切なMIMEタイプが得られない時は、未知のファイルを示すapplication/octet-streamとする
        if (!preg_match('/\A\S+?\/\S+/', $mimeType))
        {
            $mimeType = 'application/octet-stream';
        }

        header('Content-Type: ' . $mimeType);
        header('X-Content-Type-Options: nosniff');
        header('Content-Length: ' . filesize($pPath));
        header('Content-Disposition: attachment; filename="' . basename($pPath) . '"');
        header('Connection: close');

        while (ob_get_level())
        {
            ob_end_clean();
        }

        readfile($pPath);
    }
}
new FileDownloader();

?>
