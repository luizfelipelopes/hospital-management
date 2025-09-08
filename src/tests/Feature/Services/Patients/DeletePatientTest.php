<?php

use App\Models\Patient;
use App\Services\Patients\DeletePatientService;

describe('Delete Patient Service', function () {
    
    it('should delete a patient', function () {

        // Arrange
        $patient = Patient::factory()->create();

        // Act
        $service = new DeletePatientService();
        $deleted = $service->execute($patient);        

        // Assert
        expect($deleted)->toBe(true);

    });
    
});