<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        $users=[
            [
                'id'=>1,
                'name' => 'Admin',
                'email' => 'admin@support.com',
                'password' => bcrypt('secret'),
                'role_id'=>1
            ]
        ];
        foreach($users as $user){
            DB::table('users')->insert($user);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // factory('App\User', 1000)->create();
    }
}
