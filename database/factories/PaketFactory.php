<?php

namespace Database\Factories;

use App\Models\Outlet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'outlet_id' => $this->faker->randomElement(Outlet::select('id')->get()),
            'jenis' => $this->faker->randomElement(['kiloan' , 'selimut' , 'bed_cover' , 'kaos' , 'lain']),
            'nama_paket'=> $this->faker->randomElement(['Paker A' , 'Paket B' , 'Paket C']),
            'harga'=> $this->faker->randomFloat()
        ];
    }
}
