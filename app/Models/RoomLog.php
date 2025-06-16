<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomLog extends Model
{
    // Optional: explicitly define table name if different
    protected $table = 'room_logs';

    // Fields that are mass assignable (needed for create() and fill())
    protected $fillable = [
        'room_name',
        'accessed_by',
        'status',
        'timestamp',
    ];

    // If you don't use created_at/updated_at fields, disable them
    public $timestamps = false;
}
