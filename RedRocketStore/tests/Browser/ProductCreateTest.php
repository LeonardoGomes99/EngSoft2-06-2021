<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProductCreateTest extends DuskTestCase
{
    /** @Test */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Bem vindo ao Sistema de Estoque');
        });
    }

    /** @test */
    public function check_if_login_function_is_working(){
        $this->browse(function (Browser $browser) {
            $browser->visit("/")
                ->type("email", "admin@admin.com")
                ->type("password", "123")
                ->press("Entrar")
                ->assertUrlIs(env('APP_URL').'/dashboard');
        });
    }
}
