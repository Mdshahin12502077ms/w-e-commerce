<?php

namespace Database\Seeders;

use App\Models\privacyPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Privacy_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data=[
           [
             'privacy_desc'=>'hi privacy',
           ]
        ];

        privacyPolicy::insert($data);
    }
}
