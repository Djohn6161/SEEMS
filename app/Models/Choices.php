<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    use HasFactory;

    public function Question(){
        return $this->belongsTo(Question::class, 'questions_id');
    }
    public function Result(){
        return $this->hasMany(Result::class, 'choices_id');
    }
    public function Answer(){
        return $this->hasMany(Answer::class, 'answers_id');
    }
}
