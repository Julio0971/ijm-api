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
    
    public function answer () {
        return $this->hasOne(Answer::class);
    }

    protected function serializeDate (DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}