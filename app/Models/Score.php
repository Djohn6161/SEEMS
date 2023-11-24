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
}
