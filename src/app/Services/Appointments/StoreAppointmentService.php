<?php 

namespace App\Services\Appointments;

use App\DTOs\StoreAppointmentDTO;
use App\Models\Appointment;

class StoreAppointmentService {

    public function execute(StoreAppointmentDTO $appointment): Appointment
    {
        return Appointment::create((array) $appointment);
    }

}

