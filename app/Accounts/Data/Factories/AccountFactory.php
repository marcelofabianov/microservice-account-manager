<?php

namespace App\Accounts\Data\Factories;

use App\Accounts\Data\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use function now;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Accounts\Model>
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'conta_cnpj' => (string) rand(111111111111111, 211111111111111),
            'conta_razao_social' => $this->faker->company,
            'conta_email' => $this->faker->email,
            'conta_telefone' => $this->faker->phoneNumber,
            'conta_status' => (string) rand(0, 7),
            'conta_logradouro' => $this->faker->sentence,
            'conta_logradouro_numero' => (string) rand(111, 222),
            'conta_logradouro_complemento' => $this->faker->sentence,
            'data_insercao' => now()->format('Y-m-d H:i:s'),
            'data_manutencao' => now()->format('Y-m-d H:i:s'),
        ];
    }
}
