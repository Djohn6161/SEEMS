<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function Examination(){
        return $this->belongsTo(Examination::class, 'examinations_id');
    }
    public function QuestionType(){
        return $this->belongsTo(QuestionType::class, 'questiontypes_id');
    }
    public function Answer(){
        return $this->HasMany(Answer::class, 'questions_id');
    }
    public function Results(){
        return $this->hasMany(Result::class, 'questions_id');
    }
    public function Choices(){
        return $this->hasMany(Choices::class, 'questions_id');
    }
}
