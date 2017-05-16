<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWelcomePage()
    {
        $this->visit('/')
             ->see('Gem Portal')
             ->dontSee('admin')
             ->dontSee('profile');
    }
}
