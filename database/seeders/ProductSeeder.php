<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\Product::insert([
            [ 
            'brand' => 'subrtex',
            'title' => 'subrtex Leather ding Room, Dining Chairs Set of 2, Black',
            'price' => '24',
            'images' => 'dist/img/product/1721131865.png',
            'availability' => 'In Stock', // password
            'categories' => json_encode(['Home & Kitchen', 'Furniture', 'Dining Room Furniture', 'Chairs']),
            'created_at' => now(),
            ]
        ]);
        
        \App\Models\Product::insert([
            [ 
            'brand' => 'MUYETOL',
            'title' => 'Plant Repotting Mat MUYETOL Waterproof Transplanting Mat Indoor 26.8" x 26.8" Portable Square Foldab...',
            'price' => '24',
            'images' => 'dist/img/product/1721131865.png',
            'availability' => 'In Stock', // password
            'categories' => json_encode(['Patio, Lawn & Garden', 'Outdoor Décor', 'Doormats']),
            'created_at' => now(),
            ]
        ]);

        \App\Models\Product::insert([
            [ 
            'brand' => 'MUYETOL',
            'title' => 'Plant Repotting Mat MUYETOL Waterproof Transplanting Mat Indoor 26.8" x 26.8" Portable Square Foldab...',
            'price' => '24',
            'images' => 'dist/img/product/1721131865.png',
            'availability' => 'In Stock', // password
            'categories' => json_encode(['Patio, Lawn & Garden', 'Outdoor Décor', 'Doormats']),
            'created_at' => now(),
            ]
        ]);

        \App\Models\Product::insert([
            [ 
            'brand' => 'VEWETOL',
            'title' => 'Pickleball Doormat, Welcome Doormat Absorbent Non-Slip Floor Mat Bathroom Mat 16x24',
            'price' => '24',
            'images' => 'dist/img/product/1721131865.png',
            'availability' => 'Only 10 left in stock - order soon.', // password
            'categories' => json_encode(['Patio, Lawn & Garden', 'Outdoor Décor', 'Doormats']),
            'created_at' => now(),
            ]
        ]);
    }
}