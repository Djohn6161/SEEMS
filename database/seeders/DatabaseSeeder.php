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
            ExamSeeder::class
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
            "password" => "111",
            "province" => "Camarines Sur",
            "municipality" => "Baao",
            "barangay" => "Bagumbayan",
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
