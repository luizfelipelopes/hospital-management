<?php 

namespace App\Services\Doctors;

use App\DTOs\StoreDoctorDTO;
use App\Models\Doctor;
use App\Models\User;

class StoreDoctorService {

    public function execute(StoreDoctorDTO $data): Doctor
    {
        $user = $this->createUser($data); 

        return Doctor::create([
            'user_id' => $user->id,
            'speciality' =>  $data->speciality
        ]);

    }

    private function createUser(StoreDoctorDTO $data): User
    {

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
            'type' => 'doctor'
        ]);

        $user->assignRole($user->type);

        return $user;

        
    }

}

