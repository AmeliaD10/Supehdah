<?php

// app/Models/ClinicInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_picture',
        'clinic_name',
        'address',
        'contact_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
