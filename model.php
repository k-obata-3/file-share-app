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
     * ログインアカウント取得
     */
    public function getLoginAccount($name, $pass)
    {
        $stmt = $this-> pdo-> prepare(sprintf('SELECT * FROM %s WHERE name = ? AND password = ?', TABLE_NAME));
        $stmt-> execute(array($name, $pass));
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 一意のアカウントを取得
     * idが0：すべてのアカウントを対象
     * idが0以外：指定のアカウント以外を対象
     */
    public function getUniqueAccount($name, $id)
    {
        $stmt = $this-> pdo-> prepare(sprintf('SELECT name FROM %s WHERE name = ? AND id != ?', TABLE_NAME));
        $stmt-> execute(array($name, $id));
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * アカウント登録
     */
    public function insertAccount($name, $pass, $auth)
    {
        $this-> pdo-> beginTransaction();
        $stmt = $this-> pdo ->prepare(sprintf('INSERT IGNORE INTO %s (name, password, authority) values(?, ?, ?)', TABLE_NAME));
        $stmt-> execute(array($name, $pass, $auth));
        $this-> pdo-> commit();
    }

    /**
     * アカウント情報更新
     */
    public function updateAccountInfo($name, $pass, $id)
    {
        $this-> pdo-> beginTransaction();
        $stmt = $this-> pdo-> prepare(sprintf('UPDATE %s SET name = ?, password = ? WHERE id = ?', TABLE_NAME));
        $stmt-> execute(array($name, $pass, $id));
        $this-> pdo-> commit();
    }
}






 ?>
