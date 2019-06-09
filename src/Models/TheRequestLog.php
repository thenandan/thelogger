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
        'start_micro_time',
        'end_micro_time',
        'started_at',
        'returned_at',
        'ip_address',
        'url',
        'method',
        'input',
        'output',
    ];
}
