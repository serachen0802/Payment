<?php
     
class HomeModel extends connect
{
    public function check($account)
    {
        $sql = "SELECT * FROM `account` WHERE `account` = :account ";
        $check = $this->db->prepare($sql);
        $check->bindParam(':account', $account);
        $check->execute();
        $checkData = $check->fetch(PDO::FETCH_ASSOC);
        $aId = $checkData['aid'];
        $aId_s = $_SESSION['aId'];
        return $checkData;
    }
}
