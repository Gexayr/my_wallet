<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertSee('Wallet');
    }

    public function testHome()
    {
        $response = $this->call('POST', '/home');
        $response->assertStatus(405);
    }

    public function testWallet()
    {
        $response = $this->call('POST', '/wallet');
        $response->assertStatus(302);
    }
}
