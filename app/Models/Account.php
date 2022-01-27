<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $login
 * @property string $email
 * @property int $accessLevel
 */
class Account extends Model
{
    protected $connection = 'mysql_l2jls';
    protected $table = 'accounts';
    protected $primaryKey = 'login';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public static array $accessLevels = [
        -1 => 'Banned',
        0 => 'User',
        1 => 'Chat Moderator',
        2 => 'Test GM',
        3 => 'General GM',
        4 => 'Support GM',
        5 => 'Event GM',
        6 => 'Head GM',
        7 => 'Admin',
        8 => 'Master',
    ];

    protected $dates = [
        'created_time' => 'datetime'
    ];

    protected $hidden = [
        'password',
    ];

    protected $guarded = [
        'password',
    ];

    protected $fillable = [
        'login',
        'email',
        'accessLevel',
    ];

    protected $appends = [
        'access_level_text',
    ];

    public function getLastactiveAttribute($value): ?Carbon
    {
        if (! is_int($value)) {
            return null;
        }

        try {
            return Carbon::createFromFormat('U', (int) ($value / 1000));
        } catch (\Exception $exception) {
        }

        return null;
    }

    public function lastGameServer(): BelongsTo
    {
        return $this->belongsTo(GameServer::class, 'lastServer', 'server_id');
    }

    public function getAccessLevelTextAttribute(): string
    {
        return static::$accessLevels[$this->accessLevel] ?? '';
    }
}
