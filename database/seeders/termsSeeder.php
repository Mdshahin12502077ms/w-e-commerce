<?php

namespace Database\Seeders;

use App\Models\termsCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class termsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
              'terms_desc'=>'hi terms',
            ]
         ];
 
         termsCondition::insert($data);
     }
 }

