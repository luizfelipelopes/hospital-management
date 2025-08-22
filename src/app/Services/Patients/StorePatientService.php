<?php 

namespace App\Services\Patients;

use App\DTOs\StorePatientDTO;
use App\Models\Patient;

class StorePatientService {

    public function execute(StorePatientDTO $patient): Patient
    {
        return Patient::create((array) $patient);
    }

}

