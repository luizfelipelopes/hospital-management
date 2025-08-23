<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;
use App\Models\Patient;

class DeleteAppointmentService {

    public function execute(Appointment $appointment): bool
    {  
        return $appointment->delete();
    }
}

