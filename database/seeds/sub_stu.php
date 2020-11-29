<?php

use Illuminate\Database\Seeder;

class sub_stu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=8042;$i<=8256;$i++){
            for($j=1;$j<=3;$j++){
                
                DB::table('subjects_student')->insert([
                    'stu_id'=>$i,
                    'sub_id'=>rand(1,2117)
                ]);
            }
        }

    }
}
