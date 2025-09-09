<?php

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;

use Database\Seeders\PermissionSeed;
use Database\Seeders\RoleSeeder;
use Illuminate\Auth\AuthenticationException;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

describe('Appointment Controller API', function () {


    describe('List Appointments', function () {

        test('a admin can see all list appointments', function () {

            // Arrange
            
            $roles = new RoleSeeder();
            $roles->run();
            $permissions = new PermissionSeed();
            $permissions->run();

            $user = User::factory()->create([
                'type' => 'admin'
            ]);
            Appointment::factory(12)->create();

            // Act
            $response = actingAs($user)->get('/api/v1/appointments');

            // Assert
            $response->assertStatus(200);
            $response->assertJsonCount(12);
            $response->assertSuccessful();

        });

        test('a doctor can view only their own appointments', function () {

            // Arrange
            $roles = new RoleSeeder();
            $roles->run();
            $permissions = new PermissionSeed();
            $permissions->run();

            $user = User::factory()->create(['type' => 'doctor']);
            $doctor = Doctor::factory()->create([
                'user_id' => $user->id
            ]);
            $doctor2 = Doctor::factory()->create();
            $patient = Patient::factory()->create();


            Appointment::factory(3)->create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
            ]);
            
            Appointment::factory(12)->create([
                'doctor_id' => $doctor2->id,
                'patient_id' => $patient->id,
            ]);

            // Act
            $response = actingAs($user)->get('/api/v1/appointments');

            // Assert
            $response->assertSuccessful();
            $response->assertJsonCount(count: 3);


        });

        test('a receptionist can see all appointments', function () {

            // Arrange
            $roles = new RoleSeeder();
            $roles->run();
            $permissions = new PermissionSeed();
            $permissions->run();

            $user = User::factory()->create(['type' => 'receptionist']);
            $doctor = Doctor::factory()->create();
            $doctor2 = Doctor::factory()->create();
            $patient = Patient::factory()->create();


            Appointment::factory(3)->create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
            ]);
            
            Appointment::factory(12)->create([
                'doctor_id' => $doctor2->id,
                'patient_id' => $patient->id,
            ]);

            // Act
            $response = actingAs($user)->get('/api/v1/appointments');

            // Assert
            $response->assertSuccessful();
            $response->assertJsonCount(count: 15);


        });

        it('should not list all appointments to not authenticated user', function () {

            // Arrange
            Appointment::factory(12)->create();

            // Act
            $response = get('/api/v1/appointments');

            // Assert
            try {
                $response->assertStatus(302);
            } catch (AuthenticationException $e) {
                expect($e)->toBeInstanceOf(AuthenticationException::class);
            }

        });

        it('should not list appointments to user without permissions', function () {

            // Arrange
            $user = User::factory()->create();

            // dd($user->getPermissionsViaRoles()->toArray());

            Appointment::factory(12)->create();

            // Act
            $response = actingAs($user)->get('/api/v1/appointments');

            // Assert
            $response->assertStatus(403);

        });

        
    });
    
    describe('Show Appointment', function () {
        test('admin can show a appointment', function () {})->todo();
        test('a doctor can view only their own appointment', function () {})->todo();
        test('a receptionist can view a appointment', function () {})->todo();
        it('should not show appointment to a unauthenticated user', function () {})->todo();
        it('should not show appointment to a user without permissions', function () {})->todo();
    });


    describe('Create Appointment', function () {
        it('should create a appointment', function () {})->todo();
        it('should not create a appointment to a unauthenticated user', function () {})->todo();
        it('should not create a appointment to a user without permissions', function () {})->todo();
    });

    describe('Update Appointment', function () {
        it('should update a appointment', function () {})->todo();
        it('should not update a appointment to a unauthenticated user', function () {})->todo();
        it('should not update a appointment to a user without permissions', function () {})->todo();
    });

    describe('Cancel Appointment', function () {
        it('should cancel a appointment', function () {})->todo();
        it('should not cancel a appointment to a unauthenticated user', function () {})->todo();
        it('should not cancel a appointment to a user without permissions', function () {})->todo();
    });

});