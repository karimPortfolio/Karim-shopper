<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'notifiable_id',
        'notifiable_type',
        'data',
        'read_at',
    ];

    protected $casts = [
        'id' => 'string',
        'read_at' => 'datetime',
        'data' => 'array',
    ];

    public function notifiable()
    {
        return $this->morphTo();
    }
}
