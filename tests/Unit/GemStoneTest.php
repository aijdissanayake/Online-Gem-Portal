<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\GemStone;
use App\Shop;
use App\GemSize;
use App\GemType;


class GemStoneTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRemove()
    {
        $this->assertTrue(GemStone::remove(4));
        $this->assertFalse(GemStone::remove(25));
    }

    public function testCreate(){

    	$gemStone = GemStone::create(1, 'New One',5,6,8000);

    	$this->assertEquals(1, $gemStone->shop_id);
    	$this->assertEquals('New One', $gemStone->description);
    	$this->assertEquals(5, $gemStone->gem_type_id);
    	$this->assertEquals(6, $gemStone->gem_size_id);
    	$this->assertEquals(8000, $gemStone->price);


    }

    public function testRelations(){

    	$gemStone = GemStone::find(7);

    	$this->assertInstanceOf(Shop::class, $gemStone->shop );
    	$this->assertInstanceOf(GemSize::class, $gemStone->size);
    	$this->assertInstanceOf(GemType::class, $gemStone->type);
    }
}
