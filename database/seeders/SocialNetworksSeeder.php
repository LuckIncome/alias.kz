<?php

namespace Database\Seeders;

use App\Models\SocialNetworks;
use Illuminate\Database\Seeder;

class SocialNetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialNetworks::insert([
            [
                'id' => 1,
                'hide' => 0,
                'description' => 'Facebook',
                'name' => 'facebook',
                'link' => '#',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'hide' => 0,
                'description' => 'Instagram',
                'name' => 'instagram',
                'link' => '#',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'hide' => 0,
                'description' => 'В Контакте',
                'name' => 'vk',
                'link' => '#',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
