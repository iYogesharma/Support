<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        $roles=[
            [
                'id'=>1,
                'name' => 'Admin'
            ],
            [
                'id'=>2,
                'name' => 'User'
            ]
        ];
        foreach($roles as $role){
            DB::table('roles')->insert($role);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
