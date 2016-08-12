<?php

require("/home/ubuntu/workspace/Payment/myProject/Connect.php");
require("/home/ubuntu/workspace/Payment/myProject/PageModel.php");

class PageModelTest extends \PHPUnit_Framework_TestCase
{
    public function providerTestType()
     {
        return array(
            array('轉入', 200, 4),
            array('轉出', 10, 3),
            array('轉出', 1000000, 2),
            array('轉錯', 1, '發現錯誤'),
        );
    }

    /**
    * @dataProvider providerTestType
    */
    public function testInsert($type, $money, $expectedResult)
    {
        $PageModel = new PageModel();
        $_SESSION['aId'] = '1';
        $result = $PageModel->insert($type, $money);
        $this->assertEquals($expectedResult, $result);
    }

    public function testShowTotal()
    {
        $PageModel = new PageModel();
        $_SESSION['aId'] = '1';
        $expectedResult = true;
        $result = $PageModel->showTotal();

        if($result >= 0){
            $resultAns = true;
        }

        $this->assertEquals($expectedResult, $resultAns);
    }

    public function testShowDetails()
    {
        $PageModel = new PageModel();
        $_SESSION['aId'] = '1';
        $expectedResult = true;
        $result = $PageModel->showDetails();

        if(isset($result)){
            $resultAns = true;
        }

        $this->assertEquals($expectedResult, $resultAns);
    }
}
