<?php

class PageController extends Controller 
{
    public function money ()
    {
        $this->view("Page/money");
    }
    public function insert ()
    {
        $type = $_POST['type'];
        $money = $_POST['money'];
        $model = $this->model("PageModel");
        $data = $model->insert($type, $money);
        
        switch ($data) {
            case 2:
                $this->view("alert","餘額不足 轉出失敗");
                header("refresh:0;/Payment/Page/money");
                break;
            case 3:
                $this->view("alert","轉出成功");
                header("refresh:0;/Payment/Page/money");
                break;
            case 4:
                $this->view("alert","轉入成功");
                header("refresh:0;/Payment/Page/money");
                break;
        }
            
    }
    
    public function details ()
    {
        $model =  $this->model("PageModel");
        $data = $model->details($account);
        $this->view("Page/details", $data);    
    }
}
