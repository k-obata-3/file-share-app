<?php
require_once('config.php');

/**
 * モデルクラス
 */
class Model
{
    public $pdo;

    /**
     * コンストラクタ
     */
    function __construct()
    {
        $dsn = sprintf('mysql:dbhost=%s; dbname=%s', DB_HOST, DB_NAME);
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    /**
     * アカウント検索
     */
    public function findAccount($user_id)
    {
        $stmt = $this-> pdo-> prepare(sprintf('SELECT * FROM %s WHERE user_id = ?', TABLE_NAME));
        $stmt-> execute(array($user_id));
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * アカウント情報登録
     */
    public function insertAccount($user_id, $pass, $auth)
    {
        $this-> pdo-> beginTransaction();
        $stmt = $this-> pdo ->prepare(sprintf('INSERT IGNORE INTO %s (user_id, password, authority) values(?, ?, ?)', TABLE_NAME));
        $stmt-> execute(array($user_id, $pass, $auth));
        $this-> pdo-> commit();
    }

    /**
     * アカウント情報更新
     */
    public function updateAccount($user_id, $pass, $id)
    {
        $this-> pdo-> beginTransaction();
        $stmt = $this-> pdo-> prepare(sprintf('UPDATE %s SET user_id = ?, password = ? WHERE id = ?', TABLE_NAME));
        $stmt-> execute(array($user_id, $pass, $id));
        $this-> pdo-> commit();
    }

    /**
     * アカウント一覧取得
     */
    public function getAccountList()
    {
        $stmt = $this-> pdo-> prepare(sprintf('SELECT * FROM %s', TABLE_NAME));
        $stmt-> execute();
        $rows = $stmt-> fetchAll(PDO::FETCH_ASSOC);
        $userInfo = [];

        foreach($rows as $row)
        {
            $authority = "";
            switch ($row['authority'])
            {
                case 1:
                    $authority = "管理者";
                    break;
                case 2:
                    $authority = "利用者";
                    break;
            }

            $userInfo[] = array('id'=>$row['id'], 'user_id'=>$row['user_id'], 'authNum'=>$row['authority'], 'authority'=>$authority);
        }

        return $userInfo;
    }
}
 ?>
