<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCheckUpDetails extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'PatientName',
        'DoctorName',
        'Diagnosis',
        'LabFindings',
        'DateAndTimeOfCheckUp',
    ];

}
