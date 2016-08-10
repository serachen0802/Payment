<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->view("Home/index");
        unset($_SESSION["aId"]);
    }

    //確認帳號是否已存在
    public function checkAccount()
    {
        $account = $_POST['account'];
        $model =  $this->model("HomeModel");
        $data = $model->check($account);
        if (isset($data)) {
            $this->view("Home/page1", $data);
        } else {
            $this->view("alert", "帳號錯誤");
            header("refresh:0;url = index");
        }
    }
}
