<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChMessage extends Model
{
    protected $fillable = [
        'id',
        'type',
        'from_id',
        'to_id',
        'attachment',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ch_messages';

    public $timestamps = true;
}
