<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        $teachers = array(
                        array('name'=>'Katie'), 
                        array('name'=>'Max')
                    );
        DB::table('teachers')->insert($teachers);
    }
}
