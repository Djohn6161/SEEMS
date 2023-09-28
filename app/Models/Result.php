<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }
    public function Examination(){
        return $this->belongsTo(Examination::class, 'examinations_id');
    }
    public function Question(){
        return $this->belongsTo(Question::class, 'questions_id');
    }
    public function Choice(){
        return $this->belongsTo(Choice::class, 'choices_id');
    }
}
