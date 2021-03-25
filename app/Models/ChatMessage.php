<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'sender',
        'message',
        'written_at',
        'status',
    ];

    protected $table = 'chat_messages';

    public $timestamps = false;

    public function sender () {
        return $this->belongsTo(User::class);
    }

    public function helperInfos () {
        return $this->belongsTo(Helper::class);
    }
}
