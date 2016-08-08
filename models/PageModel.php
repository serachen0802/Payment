<?php
class PageModel extends connect{

    public function insert($type, $money)
    {
        $total = $this->db->prepare("SELECT `total` FROM `account` ");
        $total->execute();
        $data = $total->fetch(PDO::FETCH_ASSOC);
        if ($type == "轉出") {
            if ($money > $data['total']) {
                return 2;
            } else {
                $this->insertDetails($type, $money, $data);
                return 3 ;
            }
        }elseif ($type == '轉入') {
           $this->insertDetails($type, $money, $data);
           return 4 ;
        }
    }
    
    public function insertDetails($type, $money, $data)
    {
        $aId = '1';
        $insert = $this->db->prepare("INSERT INTO `moneyDetails` (`aId`, `type`, `money`)
                                    VALUES (:aId, :type, :money)");
        $insert->bindParam(':aId', $aId);
        $insert->bindParam(':type', $type);
        $insert->bindParam(':money', $money, PDO::PARAM_INT);
        $insert->execute();
        
        if ($type == "轉入"){
            $total = $data['total'] + $money;
        } elseif ($type == "轉出"){
            $total = $data['total'] - $money;
        }
        $update = $this->db->prepare("UPDATE `account` SET `total` = :total");
        $update->bindParam(':total', $total);
        $update->execute();
    }
}

