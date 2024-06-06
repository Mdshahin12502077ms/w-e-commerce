<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataInsert=[
               [
                'address'=>'Dhaka',
                'phone'=>'01707966343',
                'email'=>'example@gmail.com',
                'facebook'=>'www.facebook.com',
                'youtube'=>'www.youtube.com',
                'twitter'=>'www.twiter.com',
                'instragram'=>'www.instragram.com',
                'logo'=>'logo.png'
               ]
        ];
       setting::insert($dataInsert);
    }
}
