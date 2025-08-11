<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['clinic_id', 'type', 'value'];

    public function clinic()
    {
        return $this->belongsTo(ClinicInfo::class);
    }
}