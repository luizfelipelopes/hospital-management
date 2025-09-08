<?php

use App\DTOs\UpdatePatientDTO;
use App\Models\Patient;
use App\Services\Patients\UpdatePatientService;

describe('Update Patient Service', function () {


    it('should update a patient', function() {

        //Arrange
        $patient = Patient::factory()->create();
        $patient->name = 'Test Name';

        $dtoPatient = new UpdatePatientDTO(
            name: $patient->name,
            email: $patient->email,
            phone: $patient->phone,
            address: $patient->address,
            city: $patient->city,
            state: $patient->state,
            zipcode: $patient->zipcode,
            country: $patient->country,
        );

        // Act
        $service = new UpdatePatientService();
        $updatedPatient = $service->execute($dtoPatient, $patient);
        
        $dataPatient = $updatedPatient->toArray();
        unset($dataPatient['id']);
        unset($dataPatient['created_at']);
        unset($dataPatient['updated_at']);

        // Assert
        expect($patient->name)->toBe('Test Name');
        expect($dataPatient)->toEqualCanonicalizing((array) $dtoPatient);

    });



});