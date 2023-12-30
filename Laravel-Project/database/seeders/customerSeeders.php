<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class customerSeeders extends Seeder
{
    public function run(): void
    {
        // $data = [
        //     ['username' => 'hilmy', 'fullnameCustomer' => 'Hilmy Sauffani', 'address' => 'Jalan Sukabirus', 'phonenumber' => '0812342132', 'email' => 'hilmy@gmail.com'],
        //     ['username' => 'anisa22', 'fullnameCustomer' => 'Anisa Fitriani', 'address' => 'Jalan Purnawarman', 'phonenumber' => '087654321', 'email' => 'anisa22@yahoo.com'],
        //     ['username' => 'budi_cool', 'fullnameCustomer' => 'Budi Santoso', 'address' => 'Jalan Cipedes', 'phonenumber' => '089876543', 'email' => 'budi.cool@gmail.com'],
        //     ['username' => 'sarah87', 'fullnameCustomer' => 'Sarah Amelia', 'address' => 'Jalan Citarum', 'phonenumber' => '081239876', 'email' => 'sarah87@hotmail.com'],
        //     ['username' => 'adi_jaya', 'fullnameCustomer' => 'Adi Jaya', 'address' => 'Jalan Ahmad Yani', 'phonenumber' => '081223344', 'email' => 'adi.jaya@gmail.com'],
        //     ['username' => 'nina_56', 'fullnameCustomer' => 'Nina Rahayu', 'address' => 'Jalan Merdeka', 'phonenumber' => '087654321', 'email' => 'nina_56@gmail.com'],
        //     ['username' => 'donny77', 'fullnameCustomer' => 'Donny Kusuma', 'address' => 'Jalan Kopo', 'phonenumber' => '089887766', 'email' => 'donny77@yahoo.com'],
        //     ['username' => 'annisah', 'fullnameCustomer' => 'Annisa Hartanti', 'address' => 'Jalan Dago', 'phonenumber' => '081298765', 'email' => 'annisah@gmail.com'],
        //     ['username' => 'eka_junior', 'fullnameCustomer' => 'Eka Pratama', 'address' => 'Jalan Setiabudi', 'phonenumber' => '0812000111', 'email' => 'eka.junior@hotmail.com'],
        //     ['username' => 'rita22', 'fullnameCustomer' => 'Rita Widya', 'address' => 'Jalan Kebon Sirih', 'phonenumber' => '081245678', 'email' => 'rita22@gmail.com'],
        //     ['username' => 'yoga_345', 'fullnameCustomer' => 'Yoga Setiawan', 'address' => 'Jalan Seram', 'phonenumber' => '089876543', 'email' => 'yoga_345@yahoo.com'],
        //     ['username' => 'dian55', 'fullnameCustomer' => 'Dian Permata', 'address' => 'Jalan Tamansari', 'phonenumber' => '0812999888', 'email' => 'dian55@gmail.com'],
        //     ['username' => 'tono87', 'fullnameCustomer' => 'Tono Wibowo', 'address' => 'Jalan Dipatiukur', 'phonenumber' => '0812777666', 'email' => 'tono87@hotmail.com'],
        //     ['username' => 'lina_123', 'fullnameCustomer' => 'Lina Cahaya', 'address' => 'Jalan Cihampelas', 'phonenumber' => '087654321', 'email' => 'lina_123@gmail.com'],
        //     ['username' => 'ferdi_09', 'fullnameCustomer' => 'Ferdi Hidayat', 'address' => 'Jalan Sukajadi', 'phonenumber' => '081287654', 'email' => 'ferdi_09@yahoo.com'],
        //     ['username' => 'susi22', 'fullnameCustomer' => 'Susi Anggraeni', 'address' => 'Jalan Gegerkalong', 'phonenumber' => '0812000222', 'email' => 'susi22@gmail.com'],
        //     ['username' => 'bobby99', 'fullnameCustomer' => 'Bobby Perdana', 'address' => 'Jalan Merak', 'phonenumber' => '0899888777', 'email' => 'bobby99@gmail.com'],
        //     ['username' => 'lisa_87', 'fullnameCustomer' => 'Lisa Pratiwi', 'address' => 'Jalan Pahlawan', 'phonenumber' => '0812111222', 'email' => 'lisa_87@hotmail.com'],
        //     ['username' => 'rama_123', 'fullnameCustomer' => 'Rama Aditya', 'address' => 'Jalan Sarijadi', 'phonenumber' => '0812333444', 'email' => 'rama_123@yahoo.com'],
        //     ['username' => 'rina_kusuma', 'fullnameCustomer' => 'Rina Kusuma', 'address' => 'Jalan Karanganyar', 'phonenumber' => '0876565656', 'email' => 'rina_kusuma@gmail.com']
        // ];
    
        // foreach ($data as $value) {
        //     Customers::insert([
        //         'username' => $value['username'],
        //         'fullnameCustomer' => $value['fullnameCustomer'],
        //         'address' => $value['address'],
        //         'phonenumber' => $value['phonenumber'],
        //         'email' => $value['email'],
        //         'password' => '$2y$10$.rrcuy5p83UYhppyCbl9zOziCTgwKeV8hieK8gm4pI2xPYrMiIo2O',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);  
        // }

       
    }
}