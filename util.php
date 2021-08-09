<?php
/**
 * Util クラス
 */
class Util
{
    /**
     * コンストラクタ
     */
    function __construct()
    {

    }

    /**
     * ハッシュ化した文字列を取得する
     */
    public function getHashText($text)
    {
        return password_hash($text, PASSWORD_DEFAULT);
    }

    /**
     * ハッシュ化された値を復号して検証する
     */
    public function isVerifyHash($target, $source)
    {
        return password_verify($target, $source);
    }
}
 ?>
