<?php

namespace Database\Seeders;

use File;
use App\Models\Absensi;
use Illuminate\Database\Seeder;
use Adrianorosa\GeoLocation\GeoLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/absensi.json');
        $absensi = json_decode($json);
        $location = GeoLocation::lookup();

        foreach($absensi as $absen)
        {
            Absensi::create([
                'user_id' => $absen->user_id,
                'picture' => $absen->picture,
                'waktu' => now(),
                'kota' => $location->getCity(),
                'longitude' => $location->getLongitude(),
                'latitude' => $location->getLatitude(),
                'keterangan' => $absen->keterangan,
            ]);
        }
    }
}
