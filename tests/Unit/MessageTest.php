<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function testModel()
    {
//        $message = new Message();
//        $message->name = '张三';
//        $message->content = '我是张三';
//        $message->save();
        $user = factory(\App\Model\Message::class)->create();
        $this->assertNotNull($user->name);


    }



}
