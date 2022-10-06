<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                "id" => 1,
                "title" => "Audi",
                "image" => "audi.png",
                "image_2x" => "audi@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 2,
                "title" => "Chevrolet",
                "image" => "chevrolet.png",
                "image_2x" => "chevrolet@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 3,
                "title" => "Fiat",
                "image" => "fiat.png",
                "image_2x" => "fiat@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 4,
                "title" => "Ford",
                "image" => "ford.png",
                "image_2x" => "ford@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 5,
                "title" => "Hyundai",
                "image" => "hyundai.png",
                "image_2x" => "hyundai@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 6,
                "title" => "Jeep",
                "image" => "jeep.png",
                "image_2x" => "jeep@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 7,
                "title" => "Mercedes Benz",
                "image" => "mercedes-benz.png",
                "image_2x" => "mercedes-benz@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 8,
                "title" => "Nissan",
                "image" => "nissan.png",
                "image_2x" => "nissan@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 9,
                "title" => "Toyota",
                "image" => "toyota.png",
                "image_2x" => "toyota@2x.png",
                "created_at" => now()
            ],
            [
                "id" => 10,
                "title" => "Volkswagen",
                "image" => "volkswagen.png",
                "image_2x" => "volkswagen@2x.png",
                "created_at" => now()
            ]
        ]);
    }
}
