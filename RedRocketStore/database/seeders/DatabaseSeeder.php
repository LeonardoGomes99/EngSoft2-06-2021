<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory(5)->create();
        $product = Product::factory(100)->create();

        if (!User::where('email', '=', 'ad@min.com')->exists()) {
            $admin = User::factory()->create([
                'name' => 'Adminson',
                'email' => "ad@min.com",
                'password' => 'password'
            ]);
         }
    }
}
