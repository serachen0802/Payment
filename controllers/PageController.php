<?php

class PageController extends Controller
{
    public function money()
    {
        $this->view("Page/money");
    }

    public function insert()
    {
        $type = $_POST['type'];
        $money = $_POST['money'];
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
    }

    //顯示所有明細
    public function details()
    {
        $model = $this->model("PageModel");
        $data = $model->showdetails($account);
        $this->view("Page/details", $data);
    }
}
