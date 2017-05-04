<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\GemType;
use App\Shop;
use App\GemStone;

class GemTypeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRemove()
    {
        $this->assertTrue(GemType::remove(1));
        $this->assertFalse(GemType::remove(25));
    }

    public function testCreate(){

    	$newType = GemType::create(2, 'NewType');

    	$this->assertEquals(2, $newType->shop_id);
    	$this->assertEquals(true, $newType->active);
    	$this->assertEquals('NewType', $newType->type);

    }

    public function testRelations(){

    	$type = GemType::find(14);
    	$this->assertInstanceOf(Shop::class, $type->shop );
    	$this->assertInstanceOf(GemStone::class, $type->gemStones[0] );

    }
}
