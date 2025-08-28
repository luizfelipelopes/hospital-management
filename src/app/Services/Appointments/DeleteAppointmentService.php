<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;

class DeleteAppointmentService {

    public function execute(Appointment $appointment): Appointment
    {  
        $appointment->update(['status' => 'cancelled']);

        return $appointment;
    }
}

