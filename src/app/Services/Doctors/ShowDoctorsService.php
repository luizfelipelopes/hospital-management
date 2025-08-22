<?php 

namespace App\Services\Doctors;

use App\Models\Doctor;

class ShowDoctorsService {

    public function execute(Doctor $doctor): Doctor
    {
        return $doctor;
    }

}

