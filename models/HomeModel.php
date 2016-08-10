<?php

class HomeModel extends Connect
{
    public function check($account)
    {
        $sql = "SELECT * FROM `Account` WHERE `account` = :account";
        $check = $this->db->prepare($sql);
        $check->bindParam(':account', $account);
        $check->execute();
        $checkData = $check->fetch(PDO::FETCH_ASSOC);
        $_SESSION['aId'] = $checkData['aId'];

        return $_SESSION['aId'];
    }
}
