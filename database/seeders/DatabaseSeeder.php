<?php

namespace Database\Seeders;
use App\Models\kategori;
use App\Models\staff_kategori;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\staff::factory(10)->create();
        // \App\Models\berita::factory(10)->create();

        User::create([
            'name'=>'Aditia Viadi',
            'email'=>'aditia@gmail.com',
            'password'=>bcrypt('123456789')
        ]);
       
        kategori::create([
            'nama'=>'Kegiatan Sekolah',
            'slug'=>'kegiatan-sekolah'
        ]);
        kategori::create([
            'nama'=>'Prestasi',
            'slug'=>'prestasi'
        ]);
        staff_kategori::create([
            'jabatan'=>'Tenaga Pendidik'
        ]);
    }
}
