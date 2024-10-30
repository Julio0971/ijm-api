<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTimeInterface;

class Answer extends Model
{
    protected $guarded = [];

    protected function serializeDate (DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}