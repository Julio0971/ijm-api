<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTimeInterface;

class Subject extends Model
{
    protected $guarded = [];

    public function user () {
        return $this->belongsTo(User::class);
    }
    
    public function question () {
        return $this->belongsTo(Question::class);
    }
    
    public function answers () {
        return $this->hasMany(Answer::class);
    }

    protected function serializeDate (DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}