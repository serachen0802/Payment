<?php

class HomeController extends Controller {
    
    public function index()
    {
        $this->view("Home/index");
    }
    
    public function check()
    {
        $account = $_POST['account'];
        $model =  $this-> model("HomeModel");
        $data = $model-> check($account);
        if (isset($data['account']))
        {
            header("refresh:0,url=page1");
        } else {
            $this-> view("alert","帳號錯誤");
            header("refresh:0,url=index");
        }
    }
    public function page1()
    {
        $this-> view("Home/page1");
    }
}