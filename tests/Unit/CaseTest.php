<?php


namespace Tests\Unit;


use App\InterviewFactory;
use Tests\TestCase;

class CaseTest extends TestCase
{

    public function testMoney()
    {
        $returnMoney = InterviewFactory::getInstance()->money(2500);
        $this->assertEquals($returnMoney,2507.5);
    }

}