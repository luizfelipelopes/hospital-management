<?php

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use App\Services\Appointments\ListAppointmentsService;
use Database\Seeders\PermissionSeed;
use Database\Seeders\RoleSeeder;

describe('List Appointments Service', function() {

    beforeEach(function() {

        $roles = new RoleSeeder();
        $roles->run();
    
        $permissions = new PermissionSeed();
        $permissions->run();
    
        $this->userAdmin = User::factory()->create(['type'=> 'admin']);
    
        $this->userDoctor1 = User::factory()->create(['type' => 'doctor']);
        $doctorId = $this->userDoctor1->id;

        $this->userDoctor2 = User::factory()->create(['type' => 'doctor']);
        $patient = Patient::factory()->create();
    
        $this->doctor1 = Doctor::factory()->create([
            'user_id' => $this->userDoctor1->id,
            'speciality' => 'phsicologist'
        ]);
    
        $this->doctor2 = Doctor::factory()->create([
            'user_id' => $this->userDoctor2->id,
            'speciality' => 'phsicologist'
        ]);
    
        Appointment::factory(3)->create([
            'doctor_id' => $this->doctor1->id,
            'patient_id' => $patient
        ]);
        
        Appointment::factory(4)->create([
            'doctor_id' => $this->doctor2->id,
            'patient_id' => $patient
        ]);
    
        $this->listAppointmentsService = new ListAppointmentsService();

    });

    it('should return appointments related a doctor', function () {

        $appointments = $this->listAppointmentsService->execute($this->userDoctor1);
        expect($appointments)->toHaveCount(3);

    });


    it('should list all appointments', function() {

        $listAppointments = $this->listAppointmentsService->execute($this->userAdmin);
        expect($listAppointments)->toHaveCount(7);
    });

});