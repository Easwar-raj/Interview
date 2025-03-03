<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'question_id', 'selected_answer', 'is_correct'];

public function question()
{
    return $this->belongsTo(Question::class);
}}