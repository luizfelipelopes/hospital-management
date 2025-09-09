<?php

use App\Models\Doctor;
use App\Services\Doctors\ListDoctorsService;

describe('List Doctors Service', function () {


    it('should list all doctors', function () {

        // Arrange
        
        $doctors = Doctor::factory(10)->create();

        // Act
        $service = new ListDoctorsService();
        $listDoctors = $service->execute();

        // Assert
        expect($listDoctors->count())->toBe(10);

    });

});