<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'method',
        'path',
        'ip',
        'agent',
        'status_code',
        'request',
        'gender',
        'nProfiles'
    ];
}
