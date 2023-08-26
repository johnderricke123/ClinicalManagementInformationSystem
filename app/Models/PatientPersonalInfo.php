<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientPersonalInfo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'FirstName',
        'LastName',
        'Address',
        'Age',
        'Gender',
        'DateOfBirth',
        'PlaceOfBirth',
        'Occupation',
        'Contact',
    ];
}
