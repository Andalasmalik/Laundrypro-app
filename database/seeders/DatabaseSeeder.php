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
        Paket::factory(6)->create();
        // Member::factory(6)->create();
        // Outlet::factory(6)->create();
        // //   \App\Models\User::factory(10)->create();
        
        // User::create([
        //     'nama'=>'Malik',
        //     'email'=>'andalas@gmail.com',
        //     'password'=>bcrypt('malik12333'),
        //     'outlet_id'=> 1,
        //     'role'=>'admin'
        // ]);
        
    }
}
