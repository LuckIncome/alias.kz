<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::insert([
            [
                'id' => 1,
                'hide' => 0,
                'category_id' => 1,
                'name' => 'Чугунные',
                'slug' => Str::slug('Чугунные', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'hide' => 0,
                'category_id' => 1,
                'name' => 'Стальные',
                'slug' => Str::slug('Стальные', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'hide' => 0,
                'category_id' => 1,
                'name' => 'Фланцевые',
                'slug' => Str::slug('Фланцевые', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
