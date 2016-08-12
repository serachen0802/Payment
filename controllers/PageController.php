<?php

class PageController extends Controller
{
    public function money()
    {
        $this->view("Page/money");
    }

    public function insert()
    {
        $type = $this->confirm($_POST['type']);
        $money = $this->confirm($_POST['money']);
        $model = $this->model("PageModel");
        $data = $model->insert($type, $money);

        if ($data == 2) {
            $this->view("alert", "餘額不足 轉出失敗");
            header("refresh:0;/Payment/Page/money");
        }

        if ($data == 3) {
            $this->view("alert", "轉出成功");
            header("refresh:0;/Payment/Page/money");
        }

        if ($data == 4) {
            $this->view("alert", "轉入成功");
            header("refresh:0;/Payment/Page/money");
        }

        if (!is_numeric($data)) {
            $this->view("alert", $data);
            header("refresh:0;/Payment/Page/money");
        }
    }

    //顯示所有明細
    public function details()
    {
        $model = $this->model("PageModel");
        $data[0] = $model->showDetails($account);
        $data[1] = $model->showTotal($account);
        $this->view("Page/details", $data);
    }

    public function confirm($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}
