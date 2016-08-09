<?php
      
class HomeModel extends connect
{
    public function check($account)
    {
        $check = $this->db->prepare("SELECT * FROM `account` WHERE `account` = :account ");
        $check->bindParam(':account', $account);
        $check->execute();
        $checkData = $check->fetch(PDO::FETCH_ASSOC);
        $aId = $checkData['aid'];
        $aId_s = $_SESSION['aId'];
        return $checkData;
    }
}      