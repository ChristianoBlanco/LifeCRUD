<?php

namespace Database\Factories;

use App\Models\pessoa;
use App\Models\pessoa_tel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory
{
    protected $model = pessoa::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nome' => $this->faker->name,
            'cpf' => $this->faker->rrn(),
            'email' => $this->faker->email,
            'dt_nasc' => $this->faker->email,
            'nacionalidade' => $this->faker->text(10)
            //'num_tel' => $this->faker->cellphoneNumber
        ];
    }
}
