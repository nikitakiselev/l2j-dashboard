<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameServer extends Model
{
    protected $connection = 'mysql_l2jls';
    protected $table = 'gameservers';
    protected $primaryKey = 'server_id';
    public $timestamps = false;
}
