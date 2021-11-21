<?php

namespace Database\Seeders;

use App\Models\ContactPhone;
use Illuminate\Database\Seeder;

class ContactPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactPhone::insert([
            [
                'id' => 1,
                'contact_id' => 1,
                'value' => '+7 (727) 344 07 64',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'contact_id' => 1,
                'value' => '+7 (775) 221 63 25',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'contact_id' => 1,
                'value' => '+7 (771) 780 87 37',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
