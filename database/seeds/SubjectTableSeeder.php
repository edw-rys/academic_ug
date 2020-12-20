<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
        	'name'	=> 'Ingles',
        ]);
        Subject::create([
        	'name'	=> 'Programaciòn',
        ]);
        Subject::create([
        	'name'	=> 'SOD',
        ]);
        Subject::create([
        	'name'	=> 'Matemàticas',
        ]);
        Subject::create([
        	'name'	=> 'Electiva',
        ]);
    }
}
