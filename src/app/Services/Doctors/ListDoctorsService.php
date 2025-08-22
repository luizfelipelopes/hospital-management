<?php 

namespace App\Services\Doctors;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Collection;

class ListDoctorsService {

    public function execute(): Collection
    {
        $doctors = Doctor::with('user')->get();

        return $doctors;
    }

}

