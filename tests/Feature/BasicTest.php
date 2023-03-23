<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /** @test */
    public function it_displays_the_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        
    }
}
