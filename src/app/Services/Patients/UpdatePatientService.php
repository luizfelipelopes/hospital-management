<?php 

namespace App\Services\Patients;

use App\DTOs\UpdatePatientDTO;
use App\Models\Patient;

class UpdatePatientService {

    public function execute(UpdatePatientDTO $updateData, Patient $patient): Patient
    {
        $patient->update((array) $updateData);

        return $patient;
    }
}

