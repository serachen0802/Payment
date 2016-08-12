<?php

require("/home/ubuntu/workspace/Payment/core/Connect.php");
require("/home/ubuntu/workspace/Payment/models/HomeModel.php");

class HomeModelTest extends \PHPUnit_Framework_TestCase
{
    public function testCheck()
    {
        $account = '0802';
        $HomeModel = new HomeModel();
        $result = $HomeModel->check($account);

        $this->assertEquals('1', $result);
    }
}
