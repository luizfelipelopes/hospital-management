<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Hash;

class UpdateDoctorDTO {
    public string $name;
    public string $email;
    public string $speciality;
    public ?string $password = null;

    public function __construct(
        string $name,
        string $email,
        string $speciality,
        ?string $password = null,
    ) {
        $this->name = $name;
        $this->email = $email;
        
        if($password) {
            $this->password = Hash::make($password);
        }
        
        $this->speciality = $speciality;
    }
}