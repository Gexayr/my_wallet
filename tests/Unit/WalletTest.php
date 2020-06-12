<?php

namespace Tests\Unit;

use App\Http\Requests\WalletRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WalletTest extends TestCase
{
    use DatabaseTransactions;

    private $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = WalletRequest::create('/wallet', 'POST', [
            'name'     =>     'test',
            'type'     =>     1,
        ]);

    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testWallet()
    {
        $this->assertTrue(true);
    }
}
