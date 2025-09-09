<?php

use App\DTOs\UpdateDoctorDTO;
use App\Models\Doctor;
use App\Services\Doctors\UpdateDoctorService;

describe('Update Doctor Service', function () {

    it('should update a doctor', function () {

        // Arrange
        $doctor = Doctor::factory()->create();

        $doctorDTO = new UpdateDoctorDTO(
            name: 'Dr. Octopus',
            email: 'dr.octopus@mail.com',
            speciality: $doctor->speciality,
        );

        // Act
        $service = new UpdateDoctorService();
        $doctorUpdated = $service->execute($doctorDTO, $doctor);


        // Assert
        expect($doctorUpdated->user->name)->toBe('Dr. Octopus');
        expect($doctorUpdated->user->email)->toBe('dr.octopus@mail.com');

    });

});