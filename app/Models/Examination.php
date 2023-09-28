<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;
    public function Question(){
        return $this->hasMany(Question::class, 'examinations_id');
    }
    public function Result(){
        return $this->hasMany(Result::class, 'examinations_id');
    }
}
