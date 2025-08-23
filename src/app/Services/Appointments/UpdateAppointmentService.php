<?php 

namespace App\Services\Appointments;

use App\DTOs\UpdateAppointmentDTO;
use App\Models\Appointment;

class UpdateAppointmentService {

    public function execute(UpdateAppointmentDTO $updateData, Appointment $appointment): Appointment
    {
        $appointment->update((array) $updateData);

        return $appointment;
    }
}

