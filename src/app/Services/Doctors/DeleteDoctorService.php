<?php 

namespace App\Services\Doctors;

use App\Models\Doctor;
use App\Models\User;

class DeleteDoctorService {

    public function execute(Doctor $doctor): bool
    {  
        $user = User::findOrFail($doctor->user_id);
        $user->delete();

        return $doctor->delete();
    }
}

