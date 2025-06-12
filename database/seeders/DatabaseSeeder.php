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

        $user1 = User::create([
            'name'     => 'Rinalds',
            'email'    => 'rinalds@test.test',
            'password' =>  bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'role' => 'admin',
        ]);            
    }
}
