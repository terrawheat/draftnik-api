<?php

namespace Tests\Unit\Services;

use JWTAuth;
use App\Services\TokenService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TokenServiceTest extends TestCase
{
    public function testCreatesATokenOnSuccessfulLogin()
    {
        $auth = $this->getMockBuilder(JWTAuth::class)
            ->setMethods(['attempt'])
            ->getMock();

        $auth->method('attempt')
            ->with($this->equalTo(['email' => 'foo@bar.com', 'password' => 'bobloblaw']))
            ->willReturn('loltoken');

        $service = new TokenService($auth);

        $this->assertEquals('loltoken', $service->Authorize('foo@bar.com', 'bobloblaw'));
    }

    public function testReturnsFalseOnUnsuccessfulLogin()
    {
        $auth = $this->getMockBuilder(JWTAuth::class)
            ->setMethods(['attempt'])
            ->getMock();

        $auth->method('attempt')
            ->with($this->callback(function ($val) {
                return $val['email'] != 'foo@bar.com' && $val['password'] != 'bobloblaw';
            }))
            ->willReturn(false);

        $service = new TokenService($auth);
        
        $this->assertEquals(false, $service->Authorize('moo@meow.co', 'sploosh`'));
    }


}
