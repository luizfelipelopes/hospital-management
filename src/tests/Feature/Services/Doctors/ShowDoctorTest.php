<?php

use App\Models\Doctor;
use App\Services\Doctors\ShowDoctorsService;

describe('Show Doctor Service', function () {


    it('should show a doctor', function () {

        // Arrange
        $doctor = Doctor::factory()->create([
            'speciality' => 'cardiologist'
        ]);        

        // Action
        $service = new ShowDoctorsService();
        $doctorShowed = $service->execute($doctor);

        // Assert
        expect($doctorShowed->speciality)->toBe('cardiologist');

    });


});