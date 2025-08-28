<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Appointment extends Model
{
    use HasFactory,  HasApiTokens;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    public function patient():  BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor():  BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
