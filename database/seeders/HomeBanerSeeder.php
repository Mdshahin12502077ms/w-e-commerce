<?php

namespace Database\Seeders;

use App\Models\HomeBaner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeBanerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
              'Baner_image'=>'baner.jpg',
            ]
         ];
 
         HomeBaner::insert($data);
     }
    }

