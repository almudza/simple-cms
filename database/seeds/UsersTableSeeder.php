<?php

use Illuminate\Database\Seeder;
use Devmus\Model\User\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mudza',
            'email' => 'mudza@gmail.com',
            'password' => bcrypt('bismillah')
        ]);

    }
}
