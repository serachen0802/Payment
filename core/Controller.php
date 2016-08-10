<?php

class Controller
{
    public function model($model)
    {
        require_once "../Payment/models/$model.php";
        return new $model ();
    }

    public function view($view, $data = [])
    {
        require_once "../Payment/views/$view.php";
    }
}
