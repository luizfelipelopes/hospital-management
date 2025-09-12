<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeed::class);

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'type' => 'admin'
        ]);
        
        User::factory()->create([
            'name' => 'Receptionist User',
            'email' => 'receptionist@example.com',
            'type' => 'receptionist'
        ]);
        
        $doctorUser = User::factory()->create([
            'name' => 'Doctor User',
            'email' => 'doctor@example.com',
            'type' => 'doctor'
        ]);

        $doctor = Doctor::factory()->create([
            'user_id' => $doctorUser->id
        ]);

        $patient = Patient::factory()->create();

        Appointment::factory(4)->create([
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id
        ]);

        Doctor::factory(10)->create();
        Patient::factory(10)->create();
        Appointment::factory(10)->create();
        

    }
}
