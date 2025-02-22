<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert data
        DB::table('detail_profile')->insert([
            'address' => 'Nganjuk',
            'nomor_tlp' => '087860616270',
            'ttl' => '2025-02-22',
            'foto' => 'picture.pnp'
        ]);
    }
}
