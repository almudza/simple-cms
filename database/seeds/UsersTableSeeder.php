<?php

use Illuminate\Database\Seeder;
use Devmus\Model\User\User;
use Devmus\Model\User\Profile;

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


        Profile::create([

            'user_id' => $user->id,
            'avatar' => 'media/avatars/large.jpg',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit modi magni a itaque iusto eum exercitationem, commodi consequuntur ratione ',
            'facebook' => 'facebook.com'
        ]);
    }
}
