<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        roles::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
        ];

        foreach ($data as $value){
            roles::insert([
                'name' => $value['name'],
            ]);
        }
    }
}
