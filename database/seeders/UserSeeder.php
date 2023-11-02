<?php

namespace Database\Seeders;

use File;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/user.json');
        $users = json_decode($json);

        foreach($users as $user)
        {
            User::create([
                "nik" => $user->nik,
                "nama_lengkap" => $user->nama_lengkap,
                "jenis_kelamin" => $user->jenis_kelamin,
                "status" => $user->status,
                "agama" => $user->agama,
                "kewarganegaraan" => $user->kewarganegaraan,
                "email" => $user->email,
                "password" => \Hash::make('test123'),
                "divisi_id" => $user->divisi_id,
                "jabatan_id" => $user->jabatan_id,
                "role_id" => $user->role_id
            ]);
        }
    }
}
