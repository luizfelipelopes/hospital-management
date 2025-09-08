<?php

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Appointments\DeleteAppointmentService;

describe('DeleteAppointmentService', function () {

    it('should cancel a appointment', function () {

        // Arrange
        $doctor = Doctor::factory()->create();
        $patient = Patient::factory()->create();
        $appointmentDate = now();
        $status = 'pending';

        $dataAppointment = [
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'appointment_date' => $appointmentDate,
            'status'=> $status
        ];

        $appointment = Appointment::factory()->create($dataAppointment);

        $newStatus = 'cancelled';

        // Act
        $service = new DeleteAppointmentService();
        $updatedApppointment = $service->execute($appointment);

        // Assert
        expect($updatedApppointment->status)->toBe($newStatus);

    });
});