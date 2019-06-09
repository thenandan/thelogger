<?php

namespace TheNandan\TheLogger\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheRequestLog extends Model
{
    use SoftDeletes;

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'start_time',
        'end_time',
        'ip_address',
        'url',
        'method',
        'input',
        'output',
    ];
}
