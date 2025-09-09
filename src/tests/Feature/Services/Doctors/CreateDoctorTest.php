<?php

use App\DTOs\StoreDoctorDTO;
use App\Services\Doctors\StoreDoctorService;
use Database\Seeders\PermissionSeed;
use Database\Seeders\RoleSeeder;

describe('Create Doctor Service', function () {

    it('should create a doctor', function () {
        // Arrange
        $roles = new RoleSeeder();
        $roles->run();
        $permissions = new PermissionSeed();
        $permissions->run();

        $doctorDTO = new StoreDoctorDTO(
            name: 'Dr. Strange',
            email: 'drstrange@mail.com',
            password: 'password',
            speciality: 'cardiologist'
        );

        // Act
        $service = new StoreDoctorService();
        $doctor = $service->execute($doctorDTO);

        // Assert
        expect($doctor->user->name)->toEqual($doctorDTO->name);
        expect($doctor->user->email)->toEqual($doctorDTO->email);
        expect($doctor->user->password)->toEqual($doctorDTO->password);
        expect($doctor->speciality)->toEqual($doctorDTO->speciality);
    });


    

});
