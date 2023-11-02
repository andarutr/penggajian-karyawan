<?php

namespace Database\Seeders;

use File;
use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/jabatan.json');
        $jabatan = json_decode($json);

        foreach($jabatan as $j)
        {
            Jabatan::create([
                'jabatan' => $j->jabatan
            ]);
        }
    }
}
