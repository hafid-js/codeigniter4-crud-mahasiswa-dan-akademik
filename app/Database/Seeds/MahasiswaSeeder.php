<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            $data = [
                'nim' => "18560".$faker->randomNumber(3, true),
                'nama' => $faker->firstName()." ".$faker->lastName(),
                'email_mahasiswa' => $faker->freeEmail,
                'jenis_kelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'alamat' => $faker->address,
                'created_at' => \CodeIgniter\I18n\Time::now(),
            ];
    
            $this->db->table('mahasiswa')->insert(($data));
        }
    }
}
