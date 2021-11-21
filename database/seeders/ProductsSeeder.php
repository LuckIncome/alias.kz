<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::insert([
            [
                'id' => 1,
                'hide' => 0,
                'category_id' => 1,
                'subcategory_id' => 1,
                'name' => 'Затвор стальной фланцевый',
                'slug' => Str::slug('Затвор стальной фланцевый', '-'),
                'title' => 'xxx',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => 'Тип задвижки 30ч6бр - параллельная с выдвижным шпинделем.',
                'image' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'hide' => 0,
                'category_id' => 2,
                'subcategory_id' => 2,
                'name' => 'Фитинг Полиэтилен',
                'slug' => Str::slug('Фитинг Полиэтилен', '-'),
                'title' => 'xxx',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => 'Установочное положение 30ч6бр любое, кроме положения – маховиком вниз.',
                'image' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'hide' => 0,
                'category_id' => 3,
                'subcategory_id' => 3,
                'name' => 'Затвор стальной фланцевый 2',
                'slug' => Str::slug('Затвор стальной фланцевый 2', '-'),
                'title' => 'xxx',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => 'Вид управления задвижки чугунной 30ч6бр – ручной привод.',
                'image' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
