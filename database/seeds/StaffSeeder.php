<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
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
                'name'      => 'Staff',
                'email'     => 'staf@staf.staf',
                'role'      => 'staf',
                'kelas'      => '-',
                'jk'        => 'PL',
                'password'  => Hash::make('q1w2e3r4'),
            ]
        );
    }
}
