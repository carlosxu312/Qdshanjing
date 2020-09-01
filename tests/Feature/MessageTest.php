<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/message');

        $response->assertStatus(200);
    }

    public function testPost()
    {
        $response = $this->post( '/message/post', ['name' => 'Carlos','content'=>'Test']);

        $response->assertStatus(302);

    }
}
