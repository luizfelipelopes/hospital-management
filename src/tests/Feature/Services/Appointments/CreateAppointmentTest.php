<?php

use App\DTOs\StoreAppointmentDTO;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Appointments\StoreAppointmentService;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\QueryException;

describe('Create Appointment Service', function() {

    it('should create a appointment', function() {

        // Arrange
        $doctor = Doctor::factory()->create();
        $patient = Patient::factory()->create();
        $today = now();
        $todayFormatted = $today->startOfSecond()->toISOString();

        $appointmentData = new StoreAppointmentDTO(
            patient_id: $patient->id,
            doctor_id: $doctor->id,
            appointment_date: $today,
            status: 'pending',
        );

        // Act
        $service = new StoreAppointmentService();
        $appointment = $service->execute($appointmentData);

        $expectedData = [
            $appointment->id, 
            $appointmentData->patient_id,
            $appointmentData->doctor_id,
            $appointmentData->status,
            $todayFormatted,
            $todayFormatted, 
            $todayFormatted
        ];

        // Assert
        expect($expectedData)->toEqualCanonicalizing($appointment->toArray());

    });
    
    it('should not create a appointment and throws a query exception for a missing patient foreign key', function() {

         // Arrange
         $doctor = Doctor::factory()->create();
         $patient = 999;
         $today = now();
 
         $appointmentData = new StoreAppointmentDTO(
             patient_id: $patient,
             doctor_id: $doctor->id,
             appointment_date: $today,
             status: 'pending',
         );

         // Act
         try {
            $service = new StoreAppointmentService();
            $service->execute($appointmentData);
         } catch (QueryException $th) {
            $this->assertEquals('23000', $th->getCode());
         }
    });
    
    it('should not create a appointment and throws a query exception for a missing doctor foreign key', function() {

         // Arrange
         $doctor = 999;
         $patient = Patient::factory()->create();
         $today = now();
 
         $appointmentData = new StoreAppointmentDTO(
             patient_id: $patient->id,
             doctor_id: $doctor,
             appointment_date: $today,
             status: 'pending',
         );

         // Act
         try {
            $service = new StoreAppointmentService();
            $service->execute($appointmentData);
         } catch (QueryException $th) {
            $this->assertEquals('23000', $th->getCode());
         }
    });
    
    it('should not create a appointment and throws a invalid format exception for a invalid appointment date', function() {

         // Arrange
         $doctor = Doctor::factory()->create();
         $patient = Patient::factory()->create();
 
         $appointmentData = new StoreAppointmentDTO(
             patient_id: $patient->id,
             doctor_id: $doctor->id,
             appointment_date: 'teste',
             status: 'pending',
         );

         $this->withoutExceptionHandling();
 
         // Act
         $service = new StoreAppointmentService();

         expect(fn () => $service->execute($appointmentData))
         ->toThrow(InvalidFormatException::class);
    });

    it('should not create a appointment and throws a query exception for a invalid status', function() {

         // Arrange
         $doctor = Doctor::factory()->create();
         $patient = Patient::factory()->create();
 
         $appointmentData = new StoreAppointmentDTO(
             patient_id: $patient->id,
             doctor_id: $doctor->id,
             appointment_date: now(),
             status: 'test',
         );

         // Act
         try {
            $service = new StoreAppointmentService();
            $service->execute($appointmentData);
         } catch (Throwable $th) {
            // assert
            $this->assertEquals('23000', $th->getCode());
         }

    });

});

