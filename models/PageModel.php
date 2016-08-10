<?php

class PageModel extends Connect
{
    public function insert($type, $money)
    {
        try {
            $this->db->beginTransaction();
            $sql = "SELECT `total` FROM `Account` WHERE `aId` = :aId FOR UPDATE";
            $total = $this->db->prepare($sql);
            $total->bindParam(':aId', $_SESSION['aId']);
            $total->execute();
            $data = $total->fetch(PDO::FETCH_ASSOC);

            /**
             * 依據回傳值顯示結果
             * return 2 轉出失敗
             * return 3 轉出成功
             * return 4 轉入成功
             */
            if ($type == "轉出") {
                // 如果轉出的餘額大於戶頭的總金額則無法轉出
                if ($money > $data['total']) {
                    return 2;
                } else {
                    // 轉出成功將資料傳進資料庫中並更改帳戶總額
                    $aId = $_SESSION['aId'];
                    date_default_timezone_set('Asia/Taipei');
                    $date = date("Y-m-d H:i");
                    $surplus = $data['total'] - $money;
                    $insert = $this->db->prepare("INSERT INTO `MoneyDetails`" .
                        "(`aId`, `date`, `type`, `money`, `surplus`)" .
                        "VALUES (:aId, :date, :type, :money, :surplus)");
                    $insert->bindParam(':aId', $aId);
                    $insert->bindParam(':type', $type);
                    $insert->bindParam(':date', $date);
                    $insert->bindParam(':money', $money, PDO::PARAM_INT);
                    $insert->bindParam(':surplus', $surplus, PDO::PARAM_INT);
                    $insert->execute();

                    $sql = "UPDATE `Account` SET `total` = `total` - :money WHERE `aId` = :aId";
                    $update = $this->db->prepare($sql);
                    $update->bindParam(':money', $money, PDO::PARAM_INT);
                    $update->bindParam(':aId', $_SESSION['aId']);
                    $update->execute();

                    $this->db->commit();

                    return 3 ;
                }
            }

            // 轉入成功將資料傳進資料庫中並更改帳戶總額
            if ($type == '轉入') {
                $aId = $_SESSION['aId'];
                date_default_timezone_set('Asia/Taipei');
                $date = date("Y-m-d H:i");
                $surplus = $data['total'] + $money;
                $insert = $this->db->prepare("INSERT INTO `MoneyDetails`" .
                    "(`aId`, `date`, `type`, `money`, `surplus`)" .
                    "VALUES (:aId, :date, :type, :money, :surplus)");
                $insert->bindParam(':aId', $aId);
                $insert->bindParam(':type', $type);
                $insert->bindParam(':date', $date);
                $insert->bindParam(':money', $money, PDO::PARAM_INT);
                $insert->bindParam(':surplus', $surplus, PDO::PARAM_INT);
                $insert->execute();

                $sql = "UPDATE `Account` SET `total` = `total` + :money WHERE `aId` = :aId";
                $update = $this->db->prepare($sql);
                $update->bindParam(':money', $money, PDO::PARAM_INT);
                $update->bindParam(':aId', $_SESSION['aId']);
                $update->execute();

                $this->db->commit();

                return 4 ;
            }
        } catch (Exception $err) {
            $this->db->rollBack();
        }
    }

    //顯示明細
    public function showDetails()
    {
        $sql = "SELECT * FROM `MoneyDetails` WHERE `aId` = :aId";
        $details = $this->db->prepare($sql);
        $details->bindParam(':aId', $_SESSION['aId']);
        $details->execute();
        $data = $details->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    // 顯示總餘額
    public function showTotal()
    {
        $sql = "SELECT * FROM `Account` WHERE `aId` = :aId";
        $total = $this->db->prepare($sql);
        $total->bindParam(':aId', $_SESSION['aId']);
        $total->execute();
        $data = $total->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
