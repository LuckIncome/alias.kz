<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::insert([
            [
                'id' => 1,
                'hide' => 0,
                'name' => 'address',
                'description' => 'Адрес',
                'value' => 'г.Алматы ул.Райымбека 312 офис 201',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'hide' => 0,
                'name' => 'email',
                'description' => 'Почта',
                'value' => 'aliasvalve@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'hide' => 0,
                'name' => 'phone-1',
                'description' => 'Телефонный номер 1',
                'value' => '8 727 344 07 64',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'hide' => 0,
                'name' => 'phone-2',
                'description' => 'Телефонный номер 2',
                'value' => '383 75-96',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'hide' => 0,
                'name' => 'mobile-phone-1',
                'description' => 'Мобильный номер 1',
                'value' => '8 771 780 87 24',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'hide' => 0,
                'name' => 'mobile-phone-2',
                'description' => 'Мобильный номер 2',
                'value' => '8 775 221 63 25',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
