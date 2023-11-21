<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ExamSeeder::class
        ]);
        User::create([
            'active' => true,
            'name' => 'Don John Daryl Curativo',
            'email' => 'don@example.com',
            'password' => Hash::make('111'),
            'role' => '1'
        ]);
        User::create([
            'active' => true,
            'name' => 'Mariel Guevara',
            'email' => 'mariel@example.com',
            'password' => Hash::make('111'),
            'role' => '1'
        ]);
        $examinee = User::create([
            'active' => true,
            'name' => 'Sample Examinee',
            'email' => 'Examinee@example.com',
            'password' => Hash::make('111'),
            'role' => '2'
        ]);
        Registration::create([
            "users_id" => $examinee->id,
            "email" => $examinee->email,
            "first_name" => "Sample",
            "last_name" => "Examinee",
            "date_of_birth" => "2001-01-01",
            "mobile_number" => "09123456789",
            "password" => "111"
        ]);


    }
}
