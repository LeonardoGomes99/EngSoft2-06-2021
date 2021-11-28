<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /** @test */
     
    public function login_and_redirect_to_dashboard()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
