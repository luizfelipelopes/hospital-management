<?php

namespace App\Http\Controllers;

use App\DTOs\StorePatientDTO;
use App\DTOs\UpdatePatientDTO;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Services\Patients\DeletePatientService;
use App\Services\Patients\ListPatientsService;
use App\Services\Patients\ShowPatientService;
use App\Services\Patients\StorePatientService;
use App\Services\Patients\UpdatePatientService;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListPatientsService $listPatientsService)
    {
        return response()->json($listPatientsService->execute());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request, StorePatientService $storePatientService)
    {
        $validated = $request->validated();

        $data = new StorePatientDTO(
            name: $validated["name"],
            email: $validated["email"],
            phone: $validated["phone"],
            address: $validated["address"],
            city: $validated["city"],
            state: $validated["state"],
            zipcode: $validated["zipcode"],
            country: $validated["country"],
        );

        $patient = $storePatientService->execute($data);
        return response()->json($patient);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, ShowPatientService $showPatientService)
    {
        return response()->json($showPatientService->execute($patient));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient, UpdatePatientService $patientService)
    {
        $validated = $request->validated();
        
        $data = new UpdatePatientDTO(
            name: $validated["name"],
            email: $validated["email"],
            phone: $validated["phone"],
            address: $validated["address"],
            city: $validated["city"],
            state: $validated["state"],
            zipcode: $validated["zipcode"],
            country: $validated["country"],
        );

        return response()->json($patientService->execute($data, $patient));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, DeletePatientService $deletePatientService)
    {
        $deletePatientService->execute($patient);

        return response()->noContent();
    }
}
