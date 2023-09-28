<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function Question(){
        return $this->belongsTo(Question::class, 'questions_id');
    }
    public function Choice(){
        return $this->belongsTo(Choice::class, 'choices_id');
    }
}
