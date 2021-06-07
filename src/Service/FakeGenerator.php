<?php

namespace App\Service;

use Faker\Factory;

class FakeGenerator
{
    private $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker->create('fr_FR');
    }

    public function wineDescription(): string
    {
        $sentence = 'Ce vin ' . $this->faker->word() . ' créé dans la ville de ' . $this->faker->city() . ' dont le millésime le plus prestigieux est ' . $this->faker->year();
        return $sentence;
    }

    public function appelation()
    {
        return $this->faker->city() . '-sur-' . $this->faker->city();
    }

    public function castle()
    {
        return 'Château ' . $this->faker->firstName();
    }

    public function __call($name, $arguments)
    {
        $word = substr($name,5);
        return $this->faker->imageUrl($arguments[0], $arguments[1], 'Image ', true, $word);
    }
}
