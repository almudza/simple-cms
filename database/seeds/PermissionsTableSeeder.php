<?php

use Illuminate\Database\Seeder;
use Devmus\Model\Admin\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Permission
        $p1 = [
            'name' => 'Post-Create',
            'for' => 'post'
         ];
        $p2 = [
            'name' => 'Post-Update',
            'for' => 'post'
         ];
        $p3 = [
            'name' => 'Post-Delete',
            'for' => 'post'
         ];
        $p4 = [
            'name' => 'Post-Publish',
            'for' => 'post'
         ];
        $p5 = [
            'name' => 'User-Create',
            'for' => 'user'
         ];
        $p6 = [
            'name' => 'User-Update',
            'for' => 'user'
         ];
        $p7 = [
            'name' => 'User-Delete',
            'for' => 'user'
         ];
        $p8 = [
            'name' => 'Category-CRUD',
            'for' => 'other'
         ];
        $p9 = [
            'name' => 'Tag-CRUD',
            'for' => 'other'
         ];

         Permission::create($p1);
         Permission::create($p2);
         Permission::create($p3);
         Permission::create($p4);
         Permission::create($p5);
         Permission::create($p6);
         Permission::create($p7);
         Permission::create($p8);
         Permission::create($p9);



        //  Roles
        $role = Devmus\Model\Admin\Role::create([
            'name' => 'Super Admin'
        ]);



    }
}
