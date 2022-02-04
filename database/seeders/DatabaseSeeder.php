<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //   \App\Models\User::factory(10)->create();
        User::create([
            'nama'=>'Malik',
            'username'=>'Bro Malik',
            'password'=>bcrypt('malik12333'),
            'outlet_id'=> 1,
            'role'=>'admin'
        ]);
    }
}
