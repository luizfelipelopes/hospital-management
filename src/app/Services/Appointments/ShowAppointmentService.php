<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;
use App\Models\User;

class ShowAppointmentService {

    public function execute(Appointment $appointment, User $user): Appointment|null
    {
        if($user->hasPermissionTo('view self appointments') && $appointment->doctor_id != $user->doctor?->id) {
            return null;
        }
        return $appointment;
    }
}

