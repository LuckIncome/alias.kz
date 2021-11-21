<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'id' => 1,
                'hide' => 0,
                'name' => 'Задвижки',
                'slug' => Str::slug('Задвижки', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'hide' => 0,
                'name' => 'Краны',
                'slug' => Str::slug('Краны', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'hide' => 0,
                'name' => 'Обратные клапана',
                'slug' => Str::slug('Обратные клапана', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'hide' => 0,
                'name' => 'Вентиля',
                'slug' => Str::slug('Вентиля', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'hide' => 0,
                'name' => 'Противопожарная безопасность',
                'slug' => Str::slug('Противопожарная безопасность', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'hide' => 0,
                'name' => 'Фильтры',
                'slug' => Str::slug('Фильтры', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'hide' => 0,
                'name' => 'Резьбовые фитинги для труб',
                'slug' => Str::slug('Резьбовые фитинги для труб', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'hide' => 0,
                'name' => 'Сварные фитинги для труб',
                'slug' => Str::slug('Сварные фитинги для труб', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'hide' => 0,
                'name' => 'ПЭ фитинги',
                'slug' => Str::slug('ПЭ фитинги', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'hide' => 0,
                'name' => 'PPR фитинги',
                'slug' => Str::slug('PPR фитинги', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 11,
                'hide' => 0,
                'name' => 'Электроды диски отрезные',
                'slug' => Str::slug('Электроды диски отрезные', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'hide' => 0,
                'name' => 'Нержавейка',
                'slug' => Str::slug('Нержавейка', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 13,
                'hide' => 0,
                'name' => 'Прочие',
                'slug' => Str::slug('Прочие', '-'),
                'seo_keywords' => 'xxx',
                'seo_description' => 'xxx',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
