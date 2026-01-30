<?php

namespace Database\Seeders;

use App\Models\Canton;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantons = [
            ['name' => 'Zurich', 'price_per_hour' => 50],
            ['name' => 'Bern', 'price_per_hour' => 48],
            ['name' => 'Luzern', 'price_per_hour' => 48],
            ['name' => 'Uri', 'price_per_hour' => 48],
            ['name' => 'Schwyz', 'price_per_hour' => 48],
            ['name' => 'Obwalden', 'price_per_hour' => 48],
            ['name' => 'Nidwalden', 'price_per_hour' => 48],
            ['name' => 'Glarus', 'price_per_hour' => 48],
            ['name' => 'Zug', 'price_per_hour' => 50],
            ['name' => 'Fribourg', 'price_per_hour' => 48],
            ['name' => 'Solothurn', 'price_per_hour' => 48],
            ['name' => 'Basel-Stadt', 'price_per_hour' => 48],
            ['name' => 'Basel-Landschaft', 'price_per_hour' => 48],
            ['name' => 'Schaffhausen', 'price_per_hour' => 48],
            ['name' => 'Appenzell A.Rh.', 'price_per_hour' => 48],
            ['name' => 'Appenzell I.Rh.', 'price_per_hour' => 48],
            ['name' => 'St. Gallen', 'price_per_hour' => 48],
            ['name' => 'Graubünden', 'price_per_hour' => 48],
            ['name' => 'Aargau', 'price_per_hour' => 48],
            ['name' => 'Thurgau', 'price_per_hour' => 48],
            ['name' => 'Ticino', 'price_per_hour' => 50],
            ['name' => 'Valais', 'price_per_hour' => 48],
            ['name' => 'Neuchâtel', 'price_per_hour' => 48],
            ['name' => 'Jura', 'price_per_hour' => 48],
            ['name' => 'Genève', 'price_per_hour' => 50],
            ['name' => 'Vaud', 'price_per_hour' => 48],
        ];

        foreach ($cantons as $canton) {
            Canton::firstOrCreate(
                ['name' => $canton['name']],
                ['price_per_hour' => $canton['price_per_hour']]
            );
        }
    }
}
