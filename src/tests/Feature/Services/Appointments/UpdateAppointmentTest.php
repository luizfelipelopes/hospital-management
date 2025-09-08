<?php

use App\DTOs\UpdateAppointmentDTO;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Appointments\UpdateAppointmentService;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\QueryException;

describe('Update Appointment Service', function() {

    it('should update appointment', function() {

        // Arrange
        $patient = Patient::factory()->create();    
        $doctor = Doctor::factory()->create();
        $appointmentDate = now();
        $status = 'pending';

        
        $dataCreate = [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => $appointmentDate,
            'status' => $status
        ];

        $appointment = Appointment::factory()->create($dataCreate);
        

        $newDoctor = Doctor::factory()->create();

        $data = new UpdateAppointmentDTO(
            patient_id: $patient->id,
            doctor_id: $newDoctor->id,
            appointment_date: $appointmentDate,
            status: $status
        );

        $expectedData = [
            'id' => $appointment->id,
            'patient_id' => $patient->id,
            'doctor_id' => $newDoctor->id,
            'appointment_date' => $appointmentDate->startOfSecond()->toISOString(),
            'created_at' => $appointmentDate->startOfSecond()->toISOString(),
            'update_at' => $appointmentDate->startOfSecond()->toISOString(),
            'status' => $status
        ];

        // Act
        $service = new UpdateAppointmentService();
        $updateAppointment = $service->execute($data, $appointment);

        // Assert
        expect($expectedData)->toEqualCanonicalizing($updateAppointment->toArray());

    });
    
    it('should not update a appointment and throws a query exception for a missing patient foreign key', function() {

       // Arrange
       $patient = Patient::factory()->create();    
       $doctor = Doctor::factory()->create();
       $appointmentDate = now();
       $status = 'pending';

       $dataCreate = [
           'patient_id' => $patient->id,
           'doctor_id' => $doctor->id,
           'appointment_date' => $appointmentDate,
           'status' => $status
       ];

       $appointment = Appointment::factory()->create($dataCreate);
       
       $newDoctorId = 999999999;

       $data = new UpdateAppointmentDTO(
           patient_id: $patient->id,
           doctor_id: $newDoctorId,
           appointment_date: $appointmentDate,
           status: $status
       );

       // Act

       try {
        $service = new UpdateAppointmentService();
        $service->execute($data, $appointment);
       } catch (QueryException $e) {
        // Assert
         expect($e->getCode())->toEqual(23000);    
       }

    });
    
    it('should not update a appointment and throws a query exception for a missing doctor foreign key', function() {

        // Arrange
       $patient = Patient::factory()->create();    
       $doctor = Doctor::factory()->create();
       $appointmentDate = now();
       $status = 'pending';

       $dataCreate = [
           'patient_id' => $patient->id,
           'doctor_id' => $doctor->id,
           'appointment_date' => $appointmentDate,
           'status' => $status
       ];

       $appointment = Appointment::factory()->create($dataCreate);
       
       $newPatientId = 999999999;

       $data = new UpdateAppointmentDTO(
           patient_id: $newPatientId,
           doctor_id: $doctor,
           appointment_date: $appointmentDate,
           status: $status
       );

       // Act
       try {
        $service = new UpdateAppointmentService();
        $service->execute($data, $appointment);
       } catch (QueryException $e) {
        // Assert
         expect($e->getCode())->toEqual(23000);    
       }

    });
    
    it('should not update a appointment and throws a invalid format exception for a invalid appointment date', function() {

        // Arrange
       $patient = Patient::factory()->create();    
       $doctor = Doctor::factory()->create();
       $appointmentDate = now();
       $status = 'pending';

       $dataCreate = [
           'patient_id' => $patient->id,
           'doctor_id' => $doctor->id,
           'appointment_date' => $appointmentDate,
           'status' => $status
       ];

       $appointment = Appointment::factory()->create($dataCreate);
       
       $newPatient = Patient::factory()->create();
       $newAppointmentDate = 'test invalid date';

       $data = new UpdateAppointmentDTO(
           patient_id: $newPatient->id,
           doctor_id: $doctor->id,
           appointment_date: $newAppointmentDate,
           status: $status
       );

       // Act
        $service = new UpdateAppointmentService();
      
       // Assert
       expect(fn () => $service->execute($data, $appointment))->toThrow(InvalidFormatException::class); 

    });
    
    it('should not update a appointment and throws a query exception for a invalid status', function() {

        // Arrange
       $patient = Patient::factory()->create();    
       $doctor = Doctor::factory()->create();
       $appointmentDate = now();
       $status = 'pending';

       $dataCreate = [
           'patient_id' => $patient->id,
           'doctor_id' => $doctor->id,
           'appointment_date' => $appointmentDate,
           'status' => $status
       ];

       $appointment = Appointment::factory()->create($dataCreate);
       $newStatus = 'invalid status'; 


       $data = new UpdateAppointmentDTO(
           patient_id: $patient,
           doctor_id: $doctor,
           appointment_date: $appointmentDate,
           status: $newStatus
       );

       // Act
       try {
        $service = new UpdateAppointmentService();
        $service->execute($data, $appointment);
       } catch (QueryException $e) {
        // Assert
         expect($e->getCode())->toEqual(23000);    
       }

    });


});