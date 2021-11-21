<?php

namespace Database\Seeders;

use App\Models\SEO;
use Illuminate\Database\Seeder;

class SEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SEO::insert([
            [
                'id' => 1,
                'page' => 'main',
                'title' => 'Главная | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'page' => 'about',
                'title' => 'О нас | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'page' => 'branches',
                'title' => 'Филиалы | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'page' => 'certificates',
                'title' => 'Сертификаты | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'page' => 'contacts',
                'title' => 'Контакты | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'page' => 'news',
                'title' => 'Новости | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'page' => 'products',
                'title' => 'Товары | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'page' => 'promotions',
                'title' => 'Акции | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'page' => 'reviews',
                'title' => 'Отзывы | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'page' => 'search',
                'title' => 'Поиск | Alias',
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
