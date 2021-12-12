<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'      => 'Kepala-Sekolah',
                'email'     => 'admin@admin.admin',
                'role'      => 'kepala-sekolah',
                'nisn'      => 'kepala-sekolah',
                'jk'        => 'PL',
                'password'  => Hash::make('q1w2e3r4'),
            ]
        );
    }
}
