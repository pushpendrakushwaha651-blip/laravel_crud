<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Load JSON file
        $json = File::get(database_path('json/students.json'));
        $students = collect(json_decode($json));

        // Loop through and insert each record
        $students->each(function ($student) {
            Student::create([
                'name'     => $student->name,
                'age'      => $student->age,
                'email'    => $student->email,
                'address'  => $student->address,
                'city'     => $student->city,
                'phone'    => $student->phone,
                'pdf'      => $student->pdf,
                'password' => $student->password,
            ]);
        });
    }
}
 // Student::create([ // ✅ Correct spelling + capital "S"
        //     'name' => 'Pushpendra Kushwaha',
        //     'age' => 25,
        //     'email' => 'pushpendra@example.com',
        //     'address' => 'Somewhere in India',
        //     'city' => 'Lucknow',
        //     'phone' => '9876543210',
        //     'pdf' => null,
        //     'password' => 'password123',
        // ]);