<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;

class ShowAppointmentService {

    public function execute(Appointment $appointment): Appointment
    {
        return $appointment;
    }
}

