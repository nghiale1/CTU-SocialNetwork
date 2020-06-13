<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $dem=10000;
        $yb=DB::table('youth_branchs')->get();
        foreach($yb as $item){
            $amount_class=rand(30,60);
            $course=substr($item->yb_name,2,4);

            for($j=1;$j<=$amount_class;$j++){
                $dem++;
                DB::table('students')->insert([
                    [
                        'username'=>'B'.$course.$dem,
                        'password'=>\Hash::make('ctu'),
                        'stu_birth'=>$faker->date,
                        'stu_code'=>'B'.$course.$dem,
                        'stu_address'=>$faker->address,
                        'stu_gmail'=>$faker->unique()->safeEmail,
                        'yb_id'=>$item->yb_id
                    ],
                ]);
            }

        }
    }
}
