<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListAppointmentsService {

    public function execute(?User $user = null): Collection
    {

        $doctorId = $this->recoverDoctorId($user);
        
        $appointments = Appointment::with(['patient', 'doctor', 'doctor.user'])
        ->when($doctorId, function ($query) use ($doctorId) {
            return $query->where('doctor_id', $doctorId);
        })
        ->get();

        return $appointments;
    }

    private function recoverDoctorId(?User $user = null): int|null
    {
        $userCanSeeAllAppointments = $user?->hasPermissionTo('view appointments');

        if($userCanSeeAllAppointments) {
            return null;
        }

        return $user->doctor->id;
    }

}