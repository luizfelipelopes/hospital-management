<?php

namespace App\Http\Controllers;

use App\DTOs\StoreAppointmentDTO;
use App\DTOs\UpdateAppointmentDTO;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Services\Appointments\DeleteAppointmentService;
use App\Services\Appointments\ListAppointmentsService;
use App\Services\Appointments\ShowAppointmentService;
use App\Services\Appointments\StoreAppointmentService;
use App\Services\Appointments\UpdateAppointmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListAppointmentsService $service): JsonResponse
    {
        return response()->json($service->execute());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request, StoreAppointmentService $service): JsonResponse
    {
        $validated = $request->validated();

        $data = new StoreAppointmentDTO(
           patient_id: $validated['patient_id'],
           doctor_id: $validated['doctor_id'],
           appointment_date: $validated['appointment_date'],
           status: $validated['status'],
        );

        return response()->json($service->execute($data));

    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment, ShowAppointmentService $service): JsonResponse
    {
        return response()->json($service->execute($appointment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment, UpdateAppointmentService $service): JsonResponse
    {
        $validated = $request->validated();

        $data = new UpdateAppointmentDTO(
           patient_id: $validated['patient_id'],
           doctor_id: $validated['doctor_id'],
           appointment_date: $validated['appointment_date'],
           status: $validated['status'],
        );

        return response()->json($service->execute($data, $appointment));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment, DeleteAppointmentService $service): Response
    {
        $service->execute($appointment);
        return response()->noContent();
    }
}
