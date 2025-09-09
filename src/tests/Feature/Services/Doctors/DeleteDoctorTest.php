<?php

use App\Models\Doctor;
use App\Services\Doctors\DeleteDoctorService;

describe('Delete Doctor Service', function () {

    it('should delete a doctor', function () {

        // Arrange
        $doctor = Doctor::factory()->create();
        
        // Act
        $service = new DeleteDoctorService();
        $deleted = $service->execute($doctor);

        // Assert
        expect($deleted)->toBeTruthy();

    });


});