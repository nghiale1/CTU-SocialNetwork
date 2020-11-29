<?php

use Illuminate\Database\Seeder;

class clear extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('students')->delete();
        DB::table('students_ub')->delete();
        // DB::table('subjects_student')->delete();
    }
}
