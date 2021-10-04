<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_id',
        'helper_id',
        'status',
    ];

    protected $table = 'helpers';

    public $timestamps = false;

    public function helper () {
        return $this->belongsTo(User::class);
    }

    public function announcement () {
        return $this->belongsTo(Announcement::class);
    }
}
