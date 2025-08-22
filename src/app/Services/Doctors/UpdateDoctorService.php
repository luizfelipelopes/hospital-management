<?php 

namespace App\Services\Doctors;

use App\DTOs\UpdateDoctorDTO;
use App\Models\Doctor;
use App\Models\User;

class UpdateDoctorService {

    public function execute(UpdateDoctorDTO $data, Doctor $doctor): Doctor
    {
        $user = User::findOrFail($doctor->user_id);
        $this->updateUser($data, $user);

        $doctor->update([
            'speciality' =>  $data->speciality
        ]);

        return $doctor;
    }

    private function updateUser(UpdateDoctorDTO $data, User $user): bool
    {
        return $user->update([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ]);
    }

}

