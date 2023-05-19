<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Cv;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Template;
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


        User::factory(967)->create();

        $admin = User::create([
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
            'country_id' => 1,
            'city_id' => 1,
        ]);

        $categories = [
            [
                'title_en' => 'Doctors',
                'title_ar' => 'الأطباء',
            ],
            [
                'title_en' => 'Programmers',
                'title_ar' => 'المبرمجين',
            ],
            [
                'title_en' => 'Designers',
                'title_ar' => 'المصممين',
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' =>  json_encode([
                    'en' => $category['title_en'],
                    'ar' => $category['title_ar'],
                ], JSON_UNESCAPED_UNICODE),
                'slug' => makeSlug($category['title_en']),
                'created_by' => $admin->id,
            ]);
        }


        $templates = [
            [
                'cover' => 'templates/template_1.png',
                'template_code' => file_get_contents(resource_path('views/template_designs/template_1.blade.php')),
                'is_free' => 0,
                'created_by' => $admin->id,
                'category_id' => 1,
            ],
            [
                'cover' => 'templates/template_2.png',
                'template_code' => file_get_contents(resource_path('views/template_designs/template_2.blade.php')),
                'is_free' => 0,
                'created_by' => $admin->id,
                'category_id' => 1,
            ],
            [
                'cover' => 'templates/template_3.png',
                'template_code' => file_get_contents(resource_path('views/template_designs/template_3.blade.php')),
                'is_free' => 0,
                'created_by' => $admin->id,
                'category_id' => 2,
            ],
            [
                'cover' => 'templates/template_4.png',
                'template_code' => file_get_contents(resource_path('views/template_designs/template_4.blade.php')),
                'is_free' => 1,
                'created_by' => $admin->id,
                'category_id' => 3,
            ],
            [
                'cover' => 'templates/template_5.png',
                'template_code' => file_get_contents(resource_path('views/template_designs/template_5.blade.php')),
                'is_free' => 0,
                'created_by' => $admin->id,
                'category_id' => 2,
            ],
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }

        $cv = Cv::create([
            'user_id' => $admin->id,
            'template_id' => 1,
            'name' => 'Youssef Ahmed',
            'job_title' => 'Software Engineer',
            'email' => 'yossef96.ahmad@gmail.com',
            'phone' => '01112345678',
            'country' => 'Egypt',
            'date_of_birth' => '2000-11-04',
            'address' => 'Giza - 6 October',
            'about_me' => 'Hello, I am Youssef Ahmed,  I am a software engineer with 3 years of experience, I learn a lot of things every day and improve my skills always. I will help you to complete your work.',
        ]);

        Education::create([
            'university' => 'Giza University',
            'university_specialization' => 'Information System',
            'university_start_date' => '2019-10-10',
            'university_end_date' => '2024-07-10',
            'university_description' => 'optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
            tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
            quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos.',
            'cv_id' => $cv->id,
        ]);

        Experience::create([
            'company' => 'Google',
            'company_job_title' => 'Backend Developer',
            'company_start_date' => '2021-10-12',
            'company_end_date' => '2027-02-10',
            'company_description' => 'optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
            tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
            quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos.',
            'cv_id' => $cv->id,
        ]);

        Project::create([
            'project_title' => 'Application that build a cv',
            'project_name' => 'CV Maker',
            'project_start_date' => '2022-10-12',
            'project_end_date' => '2023-12-01',
            'project_description' => 'optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
            tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
            quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos.',
            'cv_id' => $cv->id,
        ]);

        Language::create([
            'language_name' => 'Arabic, English',
            'cv_id' => $cv->id,
        ]);

        Skill::create([
            'skill_name' => 'HTML, CSS, PHP, LARAVEL, JAVASCRIPT, REACT.JS, GITHUB, BOOTSTRAP, SQL, MYSQL, MONGO DB, NODE',
            'cv_id' => $cv->id,
        ]);
    }
}
