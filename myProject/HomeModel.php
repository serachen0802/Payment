<?php

class HomeModel
{
    public function check($account)
    {


        $dsn = 'mysql:host=localhost; dbname=Payment; charset=utf8';
        $this->db = new PDO($dsn, 'root', '',
            [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ]);
        $sql = "SELECT * FROM `Account` WHERE `account` = :account";
        $check = $this->db->prepare($sql);
        $check->bindParam(':account', $account);
        $check->execute();
        $checkData = $check->fetch(PDO::FETCH_ASSOC);
        $_SESSION['aId'] = $checkData['aId'];

        return $_SESSION['aId'];
    }
}
