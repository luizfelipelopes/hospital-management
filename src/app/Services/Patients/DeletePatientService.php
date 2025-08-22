<?php 

namespace App\Services\Patients;

use App\Models\Patient;

class DeletePatientService {

    public function execute(Patient $patient): bool
    {  
        return $patient->delete();
    }
}

