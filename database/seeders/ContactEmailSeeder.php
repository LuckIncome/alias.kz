<?php

namespace Database\Seeders;

use App\Models\ContactEmail;
use Illuminate\Database\Seeder;

class ContactEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactEmail::insert([
            [
                'id' => 1,
                'contact_id' => 1,
                'value' => 'email_1@alias.kz',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'contact_id' => 1,
                'value' => 'email_2@alias.kz',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'contact_id' => 1,
                'value' => 'email_3@alias.kz',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
