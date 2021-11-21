<?php

namespace Database\Seeders;

use App\Models\ContactAddress;
use Illuminate\Database\Seeder;

class ContactAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactAddress::insert([
            [
                'id' => 1,
                'contact_id' => 1,
                'value' => 'пр. Райымбека, 312 (уг. ул. Брусиловского)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'contact_id' => 1,
                'value' => 'ул.Красногорская, 69 (район 70-го разъезда)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'contact_id' => 1,
                'value' => 'Пр.Богенбай батыра 85/2 (база Строй Комплект)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
