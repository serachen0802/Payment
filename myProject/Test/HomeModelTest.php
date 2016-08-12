<?php

require("/home/ubuntu/workspace/Payment/myProject/HomeModel.php");

class HomeModelTest extends \PHPUnit_Framework_TestCase
{
    public function testCheck()
    {
        $account = '0802';
        $expectedResult = '1';
        $HomeModel = new HomeModel();
        $result = $HomeModel->check($account);

        $this->assertEquals($expectedResult, $result);
    }
}
