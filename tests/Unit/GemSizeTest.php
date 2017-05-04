<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\GemSize;
use App\Shop;
use App\GemStone;

class GemSizeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRemove()
    {
        $this->assertTrue(GemSize::remove(1));
        $this->assertFalse(GemSize::remove(25));
    }

    public function testCreate(){

    	$NewSize = GemSize::create(2, 'NewSize');

    	$this->assertEquals(2, $NewSize->shop_id);
    	$this->assertEquals(true, $NewSize->active);
    	$this->assertEquals('NewSize', $NewSize->size);

    }

    public function testRelations(){

    	$size = GemSize::find(7);
    	$this->assertInstanceOf(Shop::class, $size->shop );
    	$this->assertInstanceOf(GemStone::class, $size->gemStones[0] );

    }
}
