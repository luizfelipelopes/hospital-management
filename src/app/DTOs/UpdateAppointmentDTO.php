<?php

namespace App\DTOs;

class UpdateAppointmentDTO {
    public string $patient_id;
    public string $doctor_id;
    public string $appointment_date;
    public string $status;

    public function __construct(
        string $patient_id,
        string $doctor_id,
        string $appointment_date,
        string $status,
    ) {
        $this->patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
        $this->appointment_date = $appointment_date;
        $this->status = $status;
    }
}