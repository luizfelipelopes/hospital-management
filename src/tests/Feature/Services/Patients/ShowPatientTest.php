<?php

use App\Models\Patient;
use App\Services\Patients\ShowPatientService;

describe('Show Patient Service', function () {

    it('should return a patient', function () {

        // Arrange
        $dataPatient = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state,
            'zipcode' => fake()->postcode(),
            'country' => fake()->country()
        ];

        $patient = Patient::factory()->create($dataPatient);

        // Act
        $service = new ShowPatientService();
        $patientShowed = $service->execute($patient);
        
        $dataPatientShowed = $patientShowed->toArray();
        unset($dataPatientShowed['id']);
        unset($dataPatientShowed['created_at']);
        unset($dataPatientShowed['updated_at']);

        // Assert
        expect($dataPatientShowed)->toEqualCanonicalizing($dataPatient);


    });

});