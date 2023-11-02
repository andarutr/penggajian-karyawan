<?php

namespace Database\Seeders;

use File;
use App\Models\Gaji;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/gaji.json');
        $gaji = json_decode($json);

        foreach($gaji as $g)
        {
            Gaji::create([
                'no_slip' => $g->no_slip,
                'user_id' => $g->user_id,
                'gaji_pokok' => $g->gaji_pokok,
                'absen' => $g->absen,
                'tunjangan' => $g->tunjangan,
                'total_gaji' => $g->total_gaji
            ]);
        }
    }
}
