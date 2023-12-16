<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    public function examination(){
        return $this->belongsTo(Examination::class, 'examinations_id');
    }
    public function Results(){
        return $this->hasMany(Result::class, 'scores_id');
    }
    public function questions()
    {
        return $this->hasManyThrough(Question::class, Result::class, 'scores_id', 'id', 'id', 'questions_id');
    }
}
