<?php
class PageModel extends connect{

    public function insert ($type, $money)
    {
        $this->db->beginTransaction();
        $total = $this->db->prepare("SELECT `total` FROM `account` FOR UPDATE");
        $total->execute();
        $data = $total->fetch(PDO::FETCH_ASSOC);
        // sleep(5);
        if ($type == "轉出") {
            if ($money > $data['total']) {
                return 2;
            } else {
                $aId = '1';
                $date = date("Y-m-d H:i");
                $insert = $this->db->prepare("INSERT INTO `moneyDetails` (`aId`, `date`, `type`, `money`)
                                            VALUES (:aId, :date, :type, :money)");
                $insert->bindParam(':aId', $aId);
                $insert->bindParam(':type', $type);
                $insert->bindParam(':date', $date);
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
                $this->db->commit();
                        return 3 ;
                    }
        }elseif ($type == '轉入') {
            $aId = '1';
            $date = date("Y-m-d H:i");
            $insert = $this->db->prepare("INSERT INTO `moneyDetails` (`aId`,`date`, `type`, `money`)
                                        VALUES (:aId, :date, :type, :money)");
            $insert->bindParam(':aId', $aId);
            $insert->bindParam(':type', $type);
            $insert->bindParam(':date', $date);
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
               $this->db->commit();
               return 4 ;
            }
        
    }
    
}

