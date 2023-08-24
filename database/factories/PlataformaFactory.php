<?php

namespace Database\Factories;

use App\Models\Plataforma;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plataformas>
 */
class PlataformaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Plataforma::class; 

    public function definition()
    {
        return [
            //
            'NombrePlataforma'=>$this->faker->name(),
            'Procesador'=>$this->faker->name(),
            'GPU'=>$this->faker->name()
        ];
    }
}
