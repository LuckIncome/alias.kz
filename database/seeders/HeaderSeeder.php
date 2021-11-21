<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Header::insert([
            [
                'id' => 1,
                'hide' => 0,
                'name' => 'phone',
                'description' => 'Номер телефона',
                'value' => '8 771 780 87 37',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'hide' => 0,
                'name' => 'schedule-mf',
                'description' => 'Пн-Пт',
                'value' => '9:00-18:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'hide' => 0,
                'name' => 'schedule-saturday',
                'description' => 'Суббота',
                'value' => '9:00-13:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'hide' => 0,
                'name' => 'schedule-sunday',
                'description' => 'Воскресенье',
                'value' => 'выходной',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
