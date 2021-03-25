<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terms')->delete();
        $terms = array(
                        array('term'=>'One'), 
                        array('term'=>'Two'), 
                        array('term'=>'Three'),
                    );
        DB::table('terms')->insert($terms);
    }
}
