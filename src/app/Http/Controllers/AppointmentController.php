<?php

namespace App\Http\Controllers;

use App\DTOs\StoreAppointmentDTO;
use App\DTOs\UpdateAppointmentDTO;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\Appointments\DeleteAppointmentService;
use App\Services\Appointments\ListAppointmentsService;
use App\Services\Appointments\ShowAppointmentService;
use App\Services\Appointments\StoreAppointmentService;
use App\Services\Appointments\UpdateAppointmentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view appointments|view self appointments')
        ->only(['index', 'show']);
        
        $this->middleware('permission:create appointments')
        ->only(['store']);
        
        $this->middleware('permission:update appointments')
        ->only(['update']);
        
        $this->middleware('permission:cancel appointments')
        ->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ListAppointmentsService $service): View
    {
        $user = auth()->user();

        return view('appointments.index', 
        ['appointments' => $service->execute($user)]);
    }

    public function create(): View
    {
        return view('appointments.create', [
            'doctors' => Doctor::all(),
            'patients' => Patient::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request, StoreAppointmentService $service): RedirectResponse
    {
        $validated = $request->validated();

        $data = new StoreAppointmentDTO(
           patient_id: $validated['patient_id'],
           doctor_id: $validated['doctor_id'],
           appointment_date: $validated['appointment_date'],
           status: $validated['status'],
        );

        $service->execute($data);
        
        return redirect()->route('appointments.index')
        ->with('success','Appointment created with success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment, ShowAppointmentService $service): View
    {
        $user = auth()->user();
        
        return view('appointments.appointment', 
        ['appointment' => $service->execute($appointment, $user),
                'doctors' => Doctor::all(),
                'patients' => Patient::all()        
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment, UpdateAppointmentService $service): RedirectResponse
    {
        $validated = $request->validated();

        $data = new UpdateAppointmentDTO(
           patient_id: $validated['patient_id'],
           doctor_id: $validated['doctor_id'],
           appointment_date: $validated['appointment_date'],
           status: $validated['status'],
        );

        $service->execute($data, $appointment);

        return redirect()->route('appointments.index')
        ->with('success','Appointment Updated with success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment, DeleteAppointmentService $service): RedirectResponse
    {
        $service->execute($appointment);

        return redirect()->route('appointments.index')
        ->with('success','Appointment cancelled with success!');
    }
}
