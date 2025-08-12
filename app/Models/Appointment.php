<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['clinic_id', 'patient_name'];

    public function customValues()
    {
        return $this->hasMany(AppointmentFieldValue::class);
    }
}
