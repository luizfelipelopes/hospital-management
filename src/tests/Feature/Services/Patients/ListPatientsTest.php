<?php

use App\Models\Patient;
use App\Services\Patients\ListPatientsService;

describe('List Patients Service', function () {

    it('should return all patients', function () {

        // Arrange
        Patient::factory(10)->create();

        // Act
        $service = new ListPatientsService();
        $patients = $service->execute();

        // Assert
        expect($patients->count())->toBe(10);
    });

});
