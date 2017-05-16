<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Shop;
use App\User;

class UserTest extends TestCase
{
    
    public function testDeActivate()
    {
        $this->assertTrue(User::deActivate(14));
        $this->assertFalse(User::deActivate(65));
    }

    public function testCreate(){

    	$user = User::create('testuser','shop','testmail@gmail.com','eqeq3454');

    	$this->assertEquals('testuser', $user->name);
    	$this->assertEquals('shop', $user->role);
    	$this->assertEquals('testmail@gmail.com', $user->email);
    	$this->assertEquals('eqeq3454', $user->password);

    }

    public function testRelations(){

    	$user = User::find(17);
    	$this->assertInstanceOf(Shop::class, $user->shop );

    }
}
