<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserLogin extends DuskTestCase
{

    /**
     * Pattern Tests
     * ActionVerb_Who/What-ToDo_ExpectedBehavior
     * check_if_users_column_is_correct
     */

    /** @test */
    public function check_if_root_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Bem vindo ao Sistema de Estoque');
        });
    }
}
