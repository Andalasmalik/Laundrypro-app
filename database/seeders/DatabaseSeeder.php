<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
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
        // Paket::factory(10)->create();
        Member::factory(10)->create();
        Outlet::factory(10)->create();
        // //   \App\Models\User::factory(10)->create();
        
        User::create([
            'nama'=>'Malik',
            'email'=>'malik@gmail.com',
            'password'=>bcrypt('andalas123'),
            'outlet_id'=> 1,
            'role'=>'admin'
        ]);
        
    }
}
