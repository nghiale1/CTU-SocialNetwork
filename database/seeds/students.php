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
        $dem=1600000;
        for($i=1;$i<=557;$i++){
            // lớp từ 10 đến 20 sv
            $amount_class=rand(10,20);

            for($j=1;$j<=$amount_class;$j++){
                $dem++;
                DB::table('students')->insert([
                    [
                        'username'=>'B'.$dem,
                        'password'=>\Hash::make('ctu'),
                        'stu_name'=>$faker->name,
                        'stu_avatar'=>'/img/avatar.jpg',
                        'stu_birth'=>$faker->date,
                        'stu_code'=>'B'.$dem,
                        'stu_address'=>$faker->address,
                        'stu_gmail'=>$faker->unique()->safeEmail,
                        'yb_id'=>$i
                    ],
                ]);
            }

        }
    }
}
