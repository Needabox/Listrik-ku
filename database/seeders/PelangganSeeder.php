<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            'username' => 'rafli_copas',
            'email' => 'rafli@copasdev.com',
            'password' => Hash::make('rafli123'),
            'nomor_kwh' => '08038103749',
            'nama_pelanggan' => 'MUHAMMAD RAFLI',
            'alamat' => 'Jl.Palapa 3',
            'id_tarif' => 1,
        ]);
    }
}
