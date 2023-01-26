<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
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
        User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'gender' => 'male',
            'age' => '22',
            'role' => 'admin',
            'phone' => '01154236789',
            'about_me' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
            optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
            tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,',
            'country' => 'egypt',
            'city' => '6 october',
        ]);

        $residences = [
            [
                "country" => [
                    'name_en' => 'Egypt',
                    'name_ar' => 'مصر',
                ],
                "cities" => [
                    [
                        'name_en' => 'Cairo',
                        'name_ar' => 'القاهرة',
                    ],
                    [
                        'name_en' => 'Giza',
                        'name_ar' => 'الجيزة',
                    ],
                    [
                        'name_en' => 'Alexandria',
                        'name_ar' => 'الاسكندرية',
                    ],
                ]
            ],
            [
                "country" => [
                    'name_en' => 'Saudi Arabia',
                    'name_ar' => 'السعودية',
                ],
                "cities" => [
                    [
                        'name_en' => 'Makkah',
                        'name_ar' => 'مكة',
                    ],
                    [
                        'name_en' => 'Medina',
                        'name_ar' => 'المدينة',
                    ],
                ]
            ]
        ];

        foreach ($residences as $residence) {
            $newCountry = Country::create([
                'name' => json_encode($residence['country'], JSON_UNESCAPED_UNICODE),
            ]);

            foreach ($residence['cities'] as $city) {
                City::create([
                    "name" => json_encode($city, JSON_UNESCAPED_UNICODE),
                    "country_id" => $newCountry->id,
                ]);
            }
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
