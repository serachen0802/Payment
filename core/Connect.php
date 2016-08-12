<?php

// 資料庫連線
class connect
{
    public $db;
    function __construct()
    {
        $dsn = 'mysql:host=localhost; dbname=Payment; charset=utf8';
        $this->db = new PDO(
            $dsn,
            'root',
            '',
            [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
