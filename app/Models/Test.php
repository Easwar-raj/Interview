<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'score', 'is_completed'];

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
     // Define the relationship
     public function student()
     {
         return $this->belongsTo(Student::class);
     }
}
