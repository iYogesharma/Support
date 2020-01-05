<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('statuses')->truncate();
        $statuses=[
            [
                'id'=>1,
                'name' => 'OPEN'
            ],
            [
                'id'=>2,
                'name' => 'CLOSED'
            ]
        ];
        foreach($statuses as $status){
            DB::table('statuses')->insert($status);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
