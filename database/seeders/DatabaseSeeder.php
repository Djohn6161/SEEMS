<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Course;
use App\Models\Registration;
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
            ExamSeeder::class,
        ]);
        User::create([
            'active' => true,
            'name' => 'Mariel Guevara',
            'email' => 'mariel@example.com',
            'password' => Hash::make('1111'),
            'role' => '1'
        ]);
        $examinee = User::create([
            'active' => true,
            'name' => 'Sample Examinee',
            'email' => 'Examinee@example.com',
            'password' => Hash::make('1111'),
            'role' => '2'
        ]);
        $examinee2 = User::create([
            'active' => true,
            'name' => 'Sample Examinee2',
            'email' => 'Examinee2@example.com',
            'password' => Hash::make('1111'),
            'created_at' => '2024-03-28 23:00:53',
            'role' => '2'
        ]);
        $examinee3 = User::create([
            'active' => true,
            'name' => 'Sample Examinee3',
            'email' => 'Examinee3@example.com',
            'password' => Hash::make('1111'),
            'created_at' => '2024-02-28 23:00:53',
            'role' => '2'
        ]);
        $examinee4 = User::create([
            'active' => true,
            'name' => 'Sample Examinee4',
            'email' => 'Examinee4@example.com',
            'password' => Hash::make('1111'),
            'created_at' => '2024-04-28 23:00:53',
            'role' => '2'
        ]);
        

        $bsit = Course::create([
            'name' => 'Bachelor of Science in Information Systems',
            'acrocode' => 'BSIS',
        ]);
        Registration::create([
            "courses_id" => $bsit->id,
            "users_id" => $examinee->id,
            "email" => $examinee->email,
            "first_name" => "Sample",
            "last_name" => "Examinee",
            "date_of_birth" => "2001-01-01",
            "mobile_number" => "09123456789",
            "password" => "1111",
            "province" => "Camarines Sur",
            "municipality" => "Baao",
            "barangay" => "Bagumbayan",
            'gender' => 1,
        ]);
        Registration::create([
            "courses_id" => $bsit->id,
            "users_id" => $examinee2->id,
            "email" => $examinee2->email,
            "first_name" => "Sample",
            "last_name" => "Examinee",
            "date_of_birth" => "2001-01-01",
            "mobile_number" => "09123456789",
            "password" => "1111",
            "province" => "Camarines Sur",
            "municipality" => "Bato",
            "barangay" => "Bagumbayan",
            'created_at' => '2024-03-28 23:00:53',
            'gender' => 0,
        ]);
        Registration::create([
            "courses_id" => $bsit->id,
            "users_id" => $examinee3->id,
            "email" => $examinee3->email,
            "first_name" => "Sample",
            "last_name" => "Examinee",
            "date_of_birth" => "2001-01-01",
            "mobile_number" => "09123456789",
            "password" => "1111",
            "province" => "Camarines Sur",
            "municipality" => "Nabua",
            "barangay" => "Bagumbayan",
            'created_at' => '2024-02-28 23:00:53',
            'gender' => 1,
        ]);
        Registration::create([
            "courses_id" => $bsit->id,
            "users_id" => $examinee4->id,
            "email" => $examinee4->email,
            "first_name" => "Sample",
            "last_name" => "Examinee",
            "date_of_birth" => "2001-01-01",
            "mobile_number" => "09123456789",
            "password" => "1111",
            "province" => "Camarines Sur",
            "municipality" => "Buhi",
            "barangay" => "Bagumbayan",
            'created_at' => '2024-04-28 23:00:53',
            'gender' => 1,
        ]);
        Course::create([
            'name' => 'Bachelor of Engineering Technology Major in Automotive',
            'acrocode' => 'BET-A',
        ]);
        Course::create([
            'name' => 'Bachelor In Engineering Technology Major in Electronics',
            'acrocode' => 'BET-ELX',
        ]);
        Course::create([
            'name' => 'Bachelor of Elementary Education',
            'acrocode' => 'BEED',
        ]);
        Course::create([
            'name' => 'Bachelor of Secondary Education Major in English',
            'acrocode' => 'BSED-English',
        ]);
        Course::create([
            'name' => 'Bachelor of Secondary Education Major in Mathematics',
            'acrocode' => 'BSED-Math',
        ]);
        Course::create([
            'name' => 'Bachelor of Secondary Education Major in Social Studies',
            'acrocode' => 'BSED-Social Studies',
        ]);
        Course::create([
            'name' => 'Bachelor of Secondary Education Major in Science',
            'acrocode' => 'BSED-Science',
        ]);
        Course::create([
            'name' => 'Bachelor of Secondary Education Major in Filipino',
            'acrocode' => 'BSED-Filipino',
        ]);
        Course::create([
            'name' => 'Bachelor of Secondary Education Major in Values Education',
            'acrocode' => 'BSED-Values Education',
        ]);


    }
}
