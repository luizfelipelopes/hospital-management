<?php

namespace App\DTOs;
class UpdatePatientDTO {
    public string $name;
    public string $email;
    public string $phone;
    public string $address;
    public string $city;
    public string $state;
    public string $zipcode;
    public string $country;

    public function __construct(
        string $name,
        string $email,
        string $phone,
        string $address,
        string $city,
        string $state,
        string $zipcode,
        string $country,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipcode = $zipcode;
        $this->country = $country;
    }
}