<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    protected $connection = 'mysql_l2jls';
    protected $table = 'accounts';
    protected $primaryKey = 'login';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $dates = [
        'created_time' => 'datetime'
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
}
