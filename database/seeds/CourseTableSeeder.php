<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
        	'name'	=> 'S7-A',
        	'code'	=> 'S7-A',
        ]);
        Course::create([
        	'name'	=> 'S7-B',
        	'code'	=> 'S7-B',
        ]);
    }
}
