<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Can;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Array of data
    
    public function run(): void
    {
        $data = [
            ['username' => 'superadmin', 'fullname' => 'Super Admin'],
            ['username' => 'admin', 'fullname' => 'Admin'],    
        ];
    
        foreach ($data as $value) {
            User::insert([
                'username' => $value['username'],
                'fullname' => $value['fullname'],
                'password' => '$2y$10$.rrcuy5p83UYhppyCbl9zOziCTgwKeV8hieK8gm4pI2xPYrMiIo2O',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);  
        }

       
    }
}
