<?php
require_once('base.php');

/**
 * ファイル一覧クラス
 */
class FileList extends Base
{
    /**
     * メイン処理
     */
    function exec()
    {
        try
        {
            $fileList = preg_grep('/^([^.])/', scandir(UPLOAD_DIR));
            $fileInfo = [];

            foreach($fileList as $file)
            {
                $absolutePath = UPLOAD_DIR ."/" .$file;
                $size = filesize($absolutePath);
                $udDate = date('Y/m/d H:i:s',filemtime($absolutePath));
                $fileInfo[] = array('name'=>$file, 'size'=>$size, 'udDate'=>$udDate, 'path'=>$absolutePath);
            }

            // ソートの基準となるkeyを取得
            $keyColumns = array_column($fileInfo, 'udDate');
            // 更新日時 降順でソート
            array_multisort($keyColumns, SORT_DESC, $fileInfo);

            $this-> smarty-> assign('user_id',$_SESSION['user_id']);
            $this-> smarty-> assign('list',$fileInfo);
            $this-> smarty-> assign('authority',$_SESSION['authority']);

            $this-> smarty-> display(FILE_LIST_VIEW);
        }
        catch(Exception $e)
        {
            printf($e-> getMessage());
        }
    }
}
new FileList();

?>
