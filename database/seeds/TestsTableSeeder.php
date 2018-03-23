<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tests = array(
            'Test for beginners',
            'Random questions about programming'
        );

        for($i = 0; $i < 2; $i++){
            $test = new App\test();
            $test->title = $tests[$i];
            $test->save();
        }
    }
}
