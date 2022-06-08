<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    public function run()
    {
        Area::create([
            'name' => 'Bashundhara',
            'code' => 1229,
        ]);

        Area::create([
            'name' => 'Gulshan',
            'code' => 1212,
        ]);

        Area::create([
            'name' => 'Mirpur',
            'code' => 1216,
        ]);

        Area::create([
            'name' => 'Mohammadpur',
            'code' => 1207,
        ]);

        Area::create([
            'name' => 'Motijheel',
            'code' => 1223,
        ]);

        Area::create([
            'name' => 'Tejgaon',
            'code' => 1215,
        ]);

        Area::create([
            'name' => 'Uttara',
            'code' => 1230,
        ]);

        Area::create([
            'name' => 'Palton',
            'code' => 1000,
        ]);

        Area::create([
            'name' => 'Lalbag',
            'code' => 1211,
        ]);

        Area::create([
            'name' => 'Dhanmondi',
            'code' => 1209,
        ]);
    }
}
