<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTimeInterface;

class Answer extends Model
{
    protected $guarded = [];
    
    public function subject () {
        return $this->belongsTo(Subject::class);
    }
    
    public function question () {
        return $this->belongsTo(QUestion::class);
    }

    protected function serializeDate (DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}