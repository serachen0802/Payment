<?php

class PageModel extends connect
{
    public function insert($type, $money)
    {
        $msg = '';
        try
        {
            $this->db->beginTransaction();
            $sql = "SELECT `total` FROM `account` WHERE `aId` = ".$_SESSION['aId']." FOR UPDATE";
            $total = $this->db->prepare($sql);

            $total->execute();
            $data = $total->fetch(PDO::FETCH_ASSOC);

            if ($type == "轉出") {
                if ($money > $data['total']) {

                    return 2;
                } else {
                    $aId = $_SESSION['aId'];
                    $date = date("Y-m-d H:i",time()+8*3600);
                    $total = $data['total'] - $money;
                    $insert = $this->db->prepare("INSERT INTO `moneyDetails`".
                    "(`aId`, `date`, `type`, `money`)".
                    "VALUES (:aId, :date, :type, :money)");
                    $insert->bindParam(':aId', $aId);
                    $insert->bindParam(':type', $type);
                    $insert->bindParam(':date', $date);
                    $insert->bindParam(':money', $money, PDO::PARAM_INT);
                    $insert->execute();
                    $total = $data['total'] - $money;
                    $sql = "UPDATE `account` SET `total` = :total";
                    $update = $this->db->prepare($sql);
                    $update->bindParam(':total', $total);
                    $update->execute();
                    $this->db->commit();

                            return 3 ;
                        }
            }elseif ($type == '轉入') {
                $aId = $_SESSION['aId'];
                $date = date("Y-m-d H:i",time()+8*3600);
                $insert = $this->db->prepare("INSERT INTO `moneyDetails`".
                "(`aId`, `date`, `type`, `money`)".
                "VALUES (:aId, :date, :type, :money)");
                $insert->bindParam(':aId', $aId);
                $insert->bindParam(':type', $type);
                $insert->bindParam(':date', $date);
                $insert->bindParam(':money', $money, PDO::PARAM_INT);
                $insert->execute();
                $total = $data['total'] + $money;
                $sql = "UPDATE `account` SET `total` = :total";
                $update = $this->db->prepare($sql);
                $update->bindParam(':total', $total);
                $update->execute();
                $this->db->commit();

                   return 4 ;
                }
        }catch (Exception $err)
            {
                $this->db->rollBack();
                $msg = $err->getMessage();
            }
    }

    public function details()
    {
        $sql = "SELECT * FROM `account` INNER JOIN `moneyDetails` ON `account`
        .`aId`=`moneyDetails`.`aId` WHERE `account`.`aId` =".$_SESSION['aId'];
        $details = $this->db->prepare($sql);
        $details->execute();
        $data = $details->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
