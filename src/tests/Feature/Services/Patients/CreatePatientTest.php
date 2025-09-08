<?php

use App\DTOs\StorePatientDTO;
use App\Services\Patients\StorePatientService;

describe('Create Patient Service', function() {

    it('should create a patient', function() {

        //Arrange
        $dtoPatient = new StorePatientDTO(
            name: fake()->name(),
            email: fake()->email(),
            phone: fake()->phoneNumber(),
            address: fake()->streetAddress(),
            city: fake()->city(),
            state: fake()->state,
            zipcode: fake()->postcode(),
            country: fake()->country(),
        );

        // Act
        $service = new StorePatientService();
        $patient = $service->execute($dtoPatient);
        
        $dataPatient = $patient->toArray();
        unset($dataPatient['id']);
        unset($dataPatient['created_at']);
        unset($dataPatient['updated_at']);

        // Assert
        expect($dataPatient)->toEqualCanonicalizing((array) $dtoPatient);

    });
});