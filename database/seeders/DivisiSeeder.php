<?php

namespace Database\Seeders;

use File;
use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/divisi.json');
        $divisi = json_decode($json);

        foreach($divisi as $div)
        {
            Divisi::create([
                'divisi' => $div->divisi
            ]);
        }
    }
}
