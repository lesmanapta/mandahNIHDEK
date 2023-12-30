<?php

namespace Database\Seeders;

use App\Models\Alamat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class alamatSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Alamat::truncate();
        Schema::enableForeignKeyConstraints();

        Alamat::insert([
            'id' => '1',
            'nomor_telepon' => '+62 812-7691-3046',
            'jalan' => 'Jalan Datuk Kasim',
            'kelurahan' => 'Khairiah Mandah',
            'kecamatan' => 'Mandah',
            'kota' => 'Kabupaten Indragiri Hilir',
            'provinsi' => 'Riau',
            'kode_pos' => '29254',
        ]);
    }
}