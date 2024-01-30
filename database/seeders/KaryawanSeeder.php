<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Karyawan Kantor Kemiri
        $branch_manager_kemiri = User::create([
            'nomor_induk_karyawan' => 'MSI0057',
            'kantor_id' => '7',
            'nama_lengkap' => 'NURSITI DINIYAH',
            'email' => 'nursitidiniyah747@gmail.com',
            'tempat_lahir_id' => '246',
            'tanggal_lahir' => '1999-09-21',
            'role' => 'Branch Manager',
            'password' => Hash::make('123'),
        ]);
        $admin_kemiri = User::create([
            'nomor_induk_karyawan' => 'MSI0075',
            'kantor_id' => '7',
            'nama_lengkap' => 'HENDRIK SURAHMAN',
            'email' => 'hendriklixon23@gmail.com',
            'tempat_lahir_id' => '246',
            'tanggal_lahir' => '1995-11-23',
            'role' => 'Admin',
            'password' => Hash::make('123'),
        ]);
        $kasi_keuangan_kemiri = User::create([
            'nomor_induk_karyawan' => 'MSI0060',
            'kantor_id' => '7',
            'nama_lengkap' => 'WAHYUDIN',
            'email' => 'wahyudin@gmail.com',
            'tempat_lahir_id' => '246',
            'tanggal_lahir' => '2002-09-04',
            'role' => 'Asmen Keuangan',
            'password' => Hash::make('123'),
        ]);
        $kasi_pembiayaan_kemiri = User::create([
            'nomor_induk_karyawan' => 'MSI0021',
            'kantor_id' => '7',
            'nama_lengkap' => 'ALDIAN FIRMANDA',
            'email' => 'aldianfirmanda@gmail.com',
            'tempat_lahir_id' => '246',
            'tanggal_lahir' => '2001-09-05',
            'role' => 'Asmen Pembiayaan',
            'password' => Hash::make('123'),
        ]);
        $staff_lapangan_kemiri = User::insert([
            [
                'nomor_induk_karyawan' => 'MSI0100',
                'kantor_id' => '7',
                'nama_lengkap' => 'SAEPUL HIDAYAT',
                'email' => 'hidayatsaepul111@gmail.com',
                'tempat_lahir_id' => '246',
                'tanggal_lahir' => '2000-09-04',
                'role' => 'Staff Lapangan',
                'password' => Hash::make('123'),
            ],
            [
                'nomor_induk_karyawan' => 'MSI0110',
                'kantor_id' => '7',
                'nama_lengkap' => 'INTAN SARI',
                'email' => 'intansr480@gmail.com',
                'tempat_lahir_id' => '246',
                'tanggal_lahir' => '2005-10-25',
                'role' => 'Staff Lapangan',
                'password' => Hash::make('123'),
            ],
        ]);
    }
}
