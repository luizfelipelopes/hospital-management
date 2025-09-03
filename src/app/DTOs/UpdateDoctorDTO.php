<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Hash;

class UpdateDoctorDTO {
    public string $name;
    public string $email;
    public ?string $password = null;
    public string $speciality;

    public function __construct(
        string $name,
        string $email,
        ?string $password = null,
        string $speciality,
    ) {
        $this->name = $name;
        $this->email = $email;
        
        if($password) {
            $this->password = Hash::make($password);
        }
        
        $this->speciality = $speciality;
    }
}