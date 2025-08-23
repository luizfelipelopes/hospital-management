<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;

class ListAppointmentsService {

    public function execute(): Collection
    {
        $appointments = Appointment::with(['patient', 'doctor', 'doctor.user'])
        ->get();

        return $appointments;
    }

}

