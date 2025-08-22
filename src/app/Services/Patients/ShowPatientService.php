<?php 

namespace App\Services\Patients;

use App\Models\Patient;

class ShowPatientService {

    public function execute(Patient $patient): Patient
    {
        return $patient;
    }
}

