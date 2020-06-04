<?php

use Illuminate\Database\Seeder;

class clubs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
            ['c_slug'=>'CAU%LAC%BO%DICH%THUAT%DAI%HOC%CAN%THO',
            'c_name'=>'CÂU LẠC BỘ DỊCH THUẬT_ĐẠI HỌC CẦN THƠ'],
            ['c_slug'=>'Cau%Lac%Bo%Taekwondo%Truong%Dai%hoc%Can%Tho',
            'c_name'=>'Câu Lạc Bộ Taekwondo Trường Đại học Cần Thơ'],
            ['c_slug'=>'CLB%Moi%Truong%-%Truong%Dai%hoc%Can%Tho',
            'c_name'=>'CLB Môi Trường - Trường Đại học Cần Thơ'],
            ['c_slug'=>'CLB%Bong%Da%Can%Tho%-%CFC',
            'c_name'=>'CLB Bóng Đá Cần Thơ - CFC'],
            ['c_slug'=>'CLB%Guitar%rua$DHCT',
            'c_name'=>'CLB Guitar rùa ĐHCT'],
            ['c_slug'=>'Cong%Dong%Sinh%Vien%Truong%Dai%Hoc%Can%Tho',
            'c_name'=>'Cộng Đồng Sinh Viên Trường Đại Học Cần Thơ'],
            ['c_slug'=>'CLB%TIENG%ANH%GIAO%TIEP%NINH%KIEU%-%CAN%THO',
            'c_name'=>'CLB TIẾNG ANH GIAO TIẾP NINH KIỀU - CẦN THƠ'],
            ['c_slug'=>'CLB%Van%Dong%Hien%Mau%Tinh%Nguyen%TP%Can%Tho',
            'c_name'=>'CLB Vận Động Hiến Máu Tình Nguyện TP Cần Thơ'],
            ['c_slug'=>'Nhom%cau%long%Can%Tho',
            'c_name'=>'Nhóm cầu lông Cần Thơ'],
        ]);
    }
}
