<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    protected function serializeDate (DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}