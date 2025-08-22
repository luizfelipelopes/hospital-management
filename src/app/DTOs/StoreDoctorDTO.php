<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Hash;

class StoreDoctorDTO {
    public string $name;
    public string $email;
    public string $password;
    public string $speciality;

    public function __construct(
        string $name,
        string $email,
        string $password,
        string $speciality,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = Hash::make($password);
        $this->speciality = $speciality;
    }
}