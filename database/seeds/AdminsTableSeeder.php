<?php

use Illuminate\Database\Seeder;
use Devmus\Model\Admin\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('bismillah'),
            'phone' => '09754655453',
            'status' => 1
        ]);
    }
}
