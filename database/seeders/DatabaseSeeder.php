<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         \App\Models\User::factory(10)->create();
         \App\Models\Company::factory(5)->create();
         \App\Models\Department::factory(15)->create();
         \App\Models\Employee::factory(20)->create();

       \App\Models\User::factory()->create([
           'name' => 'Test User',
           'email' => 'test@example.com',
       ]);
       \App\Models\Company::factory()->create([
           'name' => 'Test Company',
           'image' => 'https://images.pexels.com/photos/10680897/pexels-photo-10680897.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
       ]);
       \App\Models\Department::factory()->create([
           'name' => 'Test Department',
           'image' => 'https://images.pexels.com/photos/10680897/pexels-photo-10680897.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
           'company_id' => '1',

       ]);
       \App\Models\Employee::factory()->create([
           'name' => 'Test Employee',
           'image' => 'https://images.pexels.com/photos/10680897/pexels-photo-10680897.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
           'department_id' => '1',
       ]);
    }
}
