<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Shop;
use App\GemType;
use App\GemSize;
use App\GemStone;
use App\User;

class ShopTest extends TestCase
{
    
   public function testCreate(){

    	$shop = Shop::create(2);

    	$this->assertEquals(2, $shop->user_id);

    }

    public function testRelations(){

    	$shop = Shop::find(1);
    	$this->assertInstanceOf(User::class, $shop->user );
    	$this->assertInstanceOf(GemSize::class, $shop->gemSizes[0] );
    	$this->assertInstanceOf(GemType::class, $shop->gemTypes[0] );
    	$this->assertInstanceOf(GemStone::class, $shop->gemStones[0] );

    }
}
