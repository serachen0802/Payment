<?php

class PageModel extends connect
{
    public function insert($type, $money)
    {
        $msg = '';
        try
        {
            $this->db->beginTransaction();
            $sql = "SELECT `total` FROM `Account` ";
            $sql .= "WHERE `aId` = :aId FOR UPDATE";
            $total = $this->db->prepare($sql);
            $total->bindParam(':aId', $_SESSION['aId']);
            $total->execute();
            $data = $total->fetch(PDO::FETCH_ASSOC);

            if ($type == "轉出") {
                if ($money > $data['total']) {
                    return 2;
                } else {
                    $aId = $_SESSION['aId'];
                    date_default_timezone_set('Asia/Taipei');
                    $date = date("Y-m-d H:i");
                    $sur = $data['total'] - $money;
                    $insert = $this->db->prepare("INSERT INTO `MoneyDetails`".
                    "(`aId`, `date`, `type`, `money`, `sur`)".
                    "VALUES (:aId, :date, :type, :money, :sur)");
                    $insert->bindParam(':aId', $aId);
                    $insert->bindParam(':type', $type);
                    $insert->bindParam(':date', $date);
                    $insert->bindParam(':money', $money, PDO::PARAM_INT);
                    $insert->bindParam(':sur', $sur, PDO::PARAM_INT);
                    $insert->execute();

                    $sql = "UPDATE `Account` SET `total` = `total` + :money ";
                    $sql .= "WHERE `aId` = :aId";
                    $update = $this->db->prepare($sql);
                    $update->bindParam(':money', $money, PDO::PARAM_INT);
                    $update->bindParam(':aId', $_SESSION['aId']);
                    $update->execute();

                    $this->db->commit();

                            return 3 ;
                }
            }
            if ($type == '轉入') {
                $aId = $_SESSION['aId'];
                date_default_timezone_set('Asia/Taipei');
                $date = date("Y-m-d H:i");
                $sur = $data['total'] + $money;
                $insert = $this->db->prepare("INSERT INTO `MoneyDetails`".
                "(`aId`, `date`, `type`, `money`, `sur`)".
                "VALUES (:aId, :date, :type, :money, :sur)");
                $insert->bindParam(':aId', $aId);
                $insert->bindParam(':type', $type);
                $insert->bindParam(':date', $date);
                $insert->bindParam(':money', $money, PDO::PARAM_INT);
                $insert->bindParam(':sur', $sur, PDO::PARAM_INT);
                $insert->execute();

                $sql = "UPDATE `Account` SET `total` = `total` + :money ";
                $sql .= "WHERE `aId` = :aId";
                $update = $this->db->prepare($sql);
                $update->bindParam(':money', $money, PDO::PARAM_INT);
                $update->bindParam(':aId', $_SESSION['aId']);
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

    public function showdetails()
    {
        $sql = "SELECT * FROM `Account` INNER JOIN `MoneyDetails` ON `Account`
        .`aId`=`MoneyDetails`.`aId` WHERE `Account`.`aId` = :aId";
        $details = $this->db->prepare($sql);
        $details->bindParam(':aId', $_SESSION['aId']);
        $details->execute();
        $data = $details->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
