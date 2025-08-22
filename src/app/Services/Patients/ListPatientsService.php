<?php 

namespace App\Services\Patients;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

class ListPatientsService {

    public function execute(): Collection
    {
        return Patient::all();
    }

}

