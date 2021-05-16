<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    private $cs = [
        'Autre',
        'Agadir',
        'Arfoud',
        'Azrou',
        'Benguérir',
        'Beni Mellal',
        'Benslimane',
        'Berkane',
        'Berrechid',
        'Casablanca',
        'Dakhla',
        'Dar Bouazza',
        'El Jadida',
        'Errachidia',
        'Essaouira',
        'Fkih Ben Saleh',
        'Fés',
        'Had Soualem',
        'Inezgane',
        'Khemisset',
        'Khouribga',
        'Khénifra',
        'Kénitra',
        'Larache',
        'Laâyoune',
        'Marrakech',
        'Mechra Bel Ksiri',
        'Meknés',
        'Mohammedia',
        'Nador',
        'Ouarzazate',
        'Oujda',
        'Rabat',
        'Safi',
        'Salé',
        'Settat',
        'Sidi Bennour',
        'Sidi Kacem',
        'Skhirat',
        'Tanger',
        'Taroudant',
        'Tata',
        'Taza',
        'Temara',
        'Tétouan',

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach($this->cs as $value)
        {
            City::create([
                'city' => $value,
            ]);
        }
    }
}

