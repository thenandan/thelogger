<?php

namespace TheNandan\TheLogger\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TheRequestLog
 *
 * @property int $id
 * @property string $start_micro_time
 * @property string $end_micro_time
 * @property Carbon $started_at
 * @property Carbon $returned_at
 * @property string $ip_address
 * @property string $url
 * @property string $method
 * @property string $input
 * @property string $output
 * @property string $browser;
 * @property string $browser_version;
 * @property string $platform;
 * @property string $platform_version;
 * @property string $device;
 *
 * @package TheNandan\TheLogger\Models
 */
class TheRequestLog extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = [
        'started_at',
        'returned_at',
        'created_at',
        'updated_at',
    ];

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
        'browser',
        'browser_version',
        'platform',
        'platform_version',
        'device',
    ];
}
