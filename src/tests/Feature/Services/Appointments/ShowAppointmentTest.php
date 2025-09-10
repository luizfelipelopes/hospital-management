<?php

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Appointments\ShowAppointmentService;
use Database\Seeders\PermissionSeed;
use Database\Seeders\RoleSeeder;

describe('Show Appointment Service', function() {

    it('should shows a appointment', function() {

        // Arrange

        $roles = new RoleSeeder();
        $roles->run();
        $permissions = new PermissionSeed();
        $permissions->run();

        $doctor = Doctor::factory()->create();
        $patient = Patient::factory()->create();
        $today = now();

        $dataExpectedAppointment = [
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'appointment_date' => $today,
            'status' => 'pending'
        ];

        $appointment = Appointment::factory()->create([
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'appointment_date' => $today,
            'status' => 'pending'
        ]);

        $dataExpectedAppointment = [
            'id' => $appointment->id,
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'appointment_date' => $today->startOfSecond()->toISOString(),
            'created_at' => $today->startOfSecond()->toISOString(),
            'updated_at' => $today->startOfSecond()->toISOString(),
            'status' => 'pending'
        ];

        // Act
        $service = new ShowAppointmentService();
        $dataAppointment = $service->execute($appointment, $doctor->user);

        // Assert
        expect($dataExpectedAppointment)->toEqualCanonicalizing($dataAppointment->toArray());
    });

});