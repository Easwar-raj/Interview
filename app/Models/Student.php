<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

     // Specify which fields can be mass-assigned
     protected $fillable = [
        'full_name',
        'contact_number',
        'email',
        'college_name',
        'degree_specialization',
        'graduation_date',
        'area_of_intrest',
        'roll_number',
    ];

    // You may want to set these as hidden attributes that you don't want to be included in JSON responses
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Optionally, you could define a custom date format if needed
    protected $dates = [
        'graduation_date',
    ];
}
