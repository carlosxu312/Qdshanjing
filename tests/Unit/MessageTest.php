<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function testModel()
    {
        $message = factory(\App\Model\Message::class)->create();
        $this->assertNotNull($message->name);
        $this->assertNotNull($message->content);
    }



}
