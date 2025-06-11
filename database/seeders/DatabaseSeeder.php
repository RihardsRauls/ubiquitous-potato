<?php

namespace Database\Seeders;

use App\Models\User;
/* use App\Models\JobCategory;
use App\Models\EmploymentType;
use App\Models\Listing;
use App\Models\Application; */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

/*         JobCategory::create(['category' => 'Data Scientist']);
        JobCategory::create(['category' => 'Designer']);
        JobCategory::create(['category' => 'Marketing']);
        JobCategory::create(['category' => 'Product Manager']);
        JobCategory::create(['category' => 'Software Engineer']);

        
        EmploymentType::create(['type' => 'Contract']);
        EmploymentType::create(['type' => 'Freelance']);
        EmploymentType::create(['type' => 'Full-time']);
        EmploymentType::create(['type' => 'Internship']);
        EmploymentType::create(['type' => 'Part-time']); */


        $user1 = User::create([
            'name'     => 'Rinalds',
            'email'    => 'rinalds@test.test',
            'password' =>  bcrypt('secret'),
        ]);


/*         $user2 = User::create([
            'name'     => 'Ralfs',
            'email'    => 'ralfs@example.com',
            'password' => bcrypt('secret'),
            'role' => 'employee',
        ]); */

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'role' => 'admin',
        ]);            

/* 
        $listing1 = Listing::create([
            'title'              => JobCategory::where('category', 'Software Engineer')->first()->category,
            'description'        => 'Looking for a person',
            'company_name'       => 'InsertGeneric',
            'salary'             => 42000,
            'user_id'            => $user1->id,
            'job_category_id'    => JobCategory::where('category', 'Software Engineer')->first()->id,
            'employment_type_id' => EmploymentType::where('type', 'Full-time')->first()->id,
        ]);

        $listing2 = Listing::create([
            'title'              => JobCategory::where('category', 'Marketing')->first()->category,
            'description'        => 'Need to know how to dropship.',
            'company_name'       => 'Marketer',
            'salary'             => 30000,
            'user_id'            => $user2->id,
            'job_category_id'    => JobCategory::where('category', 'Marketing')->first()->id,
            'employment_type_id' => EmploymentType::where('type', 'Part-time')->first()->id,
        ]);

        Application::create([
            'user_id'     => $user1->id,
            'listing_id'  => $listing2->id,
            'cover_letter'=> 'I have seen bought and seen a lot of dropshipping courses :)',
        ]); */

        
    }
}
