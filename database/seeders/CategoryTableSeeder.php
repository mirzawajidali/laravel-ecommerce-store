<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Category Seeders
        $categoryRecords = [
            [
                'id' => 1,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'T-Shirt',
                'description' => 'T-Shirts',
                'url' => 't-shirt',
                'category_image' => '',
                'category_discount' => 0,
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'section_id' => 1,
                'category_name' => ' Casual T-Shirt',
                'description' => 'Casual T-Shirts',
                'url' => 'casual-t-shirt',
                'category_discount' => 0,
                'category_image' => '',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'status' => 1
            ]
        ];
        //Category Insert
        Category::insert($categoryRecords);
    }
}