<?php
session_start();
// require("/home/ubuntu/workspace/Payment/core/Connect.php");
require("/home/ubuntu/workspace/Payment/models/PageModel.php");

class PageModelTest extends \PHPUnit_Framework_TestCase
{
    protected $pre;

    public static function setUpBeforeClass()
    {
        $_SESSION['aId'] = '2';
    }

    protected function setUp()
    {
        $this->pre = new PageModel();
    }

    public function providerTestType()
     {
        return [
            ['轉入', 200, 4],
            ['轉出', 10, 3],
            ['轉出', 1000000, 2],
            ['轉錯', 1, '發現錯誤'],
        ];
    }

    /**
    * @dataProvider providerTestType
    */
    public function testInsert($type, $money, $expectedResult)
    {
        $this->pre = new PageModel();
        $result =$this->pre->insert($type, $money);
        $this->assertEquals($expectedResult, $result);
    }

    public function testShowTotal()
    {
        $this->pre = new PageModel();
        $expectedResult = true;
        $result = $this->pre->showTotal();

        if($result >= 0){
            $resultAns = true;
        }

        $this->assertEquals($expectedResult, $resultAns);
    }

    public function testShowDetails()
    {
        $this->pre = new PageModel();
        $expectedResult = true;
        $result = $this->pre->showDetails();

        if(isset($result)){
            $resultAns = true;
        }

        $this->assertEquals($expectedResult, $resultAns);
    }

    protected function tearDown()
    {
        $this->pre = null;
    }

}
