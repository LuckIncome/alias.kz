<?php

namespace Database\Seeders;

use App\Models\Certificates;
use App\Models\Contacts;
use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            SocialNetworksSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductsSeeder::class,
            CertificatesSeeder::class,
            ContactsSeeder::class,
            FooterSeeder::class,
            HeaderSeeder::class,
            NewsSeeder::class,
            PromotionsSeeder::class,
            ReviewsSeeder::class,
            ContactPhoneSeeder::class,
            ContactEmailSeeder::class,
            ContactAddressSeeder::class,
            ApplicationSeeder::class,
            SEOSeeder::class,
        ]);
    }
}
