<?php

namespace App\Http\Controllers;

use App\DTOs\StoreDoctorDTO;
use App\DTOs\UpdateDoctorDTO;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Services\Doctors\ListDoctorsService;
use App\Services\Doctors\ShowDoctorsService;
use App\Services\Doctors\StoreDoctorService;
use App\Services\Doctors\UpdateDoctorService;
use App\Services\Doctors\DeleteDoctorService;

class DoctorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view doctors')
        ->only(['index', 'show']);
        $this->middleware('permission:create doctors')
        ->only(['store']);
        $this->middleware('permission:update doctors')
        ->only(['update']);
        $this->middleware('permission:delete doctors')
        ->only(['destroy']);
    }

    public function index(ListDoctorsService $listDoctorsService)
    {
        return response()->json($listDoctorsService->execute());
    }

    public function store(StoreDoctorRequest $request, StoreDoctorService $service)
    {
        $validated = $request->validated();
        
        $data = new StoreDoctorDTO(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password'],
            speciality: $validated['speciality'],
        );

        $doctor = $service->execute($data);

        return response()->json($doctor);
    }

    public function show(Doctor $doctor, ShowDoctorsService $showDoctorsService)
    {
        return response()->json($showDoctorsService->execute($doctor));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor, UpdateDoctorService $updateDoctorService)
    {
        $validated = $request->validated();
        
        $data = new UpdateDoctorDTO(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password'],
            speciality: $validated['speciality'],
        );

        $doctor = $updateDoctorService->execute($data, $doctor);

        return response()->json($doctor);
    }
    
    public function destroy(Doctor $doctor, DeleteDoctorService $deleteDoctorService)
    {
        $deleteDoctorService->execute($doctor);
        return response()->noContent();
    }
}
