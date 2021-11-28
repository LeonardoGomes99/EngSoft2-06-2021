<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Users as Users;
use App\Models\Products as Product;

class UsersTest extends TestCase
{
    /**
     * Pattern Tests
     * ActionVerb_Who/What-ToDo_ExpectedBehavior
     * check_if_users_column_is_correct
     */


    /** @test */
    public function check_if_users_model_is_correct()
    {

        $users = new Users;

        $expected = [
            'uuid',
            'name',
            'cpf',
            'birthdate',
            'gender',
            'email',
            'job',
            'password',
            'email_verified_at',
            'remember_token',
            'created_at',
            'updated_at'
        ];

        $arrayCompared = array_diff($expected, $users->getFillable());

        //dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
        
    }

    /** @test */
    public function check_if_products_model_is_correct(){

        $Product = new Product;

        $expected = [
            'names',
            'description',
            'quantity',
            'model',
            'serial_number',
            'color',
            'added_at',
            'remember_token',
            'created_at',
            'updated_at'
        ];

        $arrayCompared = array_diff($expected, $Product->getFillable());

        //dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }

    /**
     * Pattern Tests
     * ActionVerb_Who/What-ToDo_ExpectedBehavior
     * check_if_users_column_is_correct
     */
}
