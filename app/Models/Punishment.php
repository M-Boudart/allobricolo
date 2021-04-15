<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reported_by',
        'type',
        'from_date',
        'to_date',
        'reason',
    ];

    protected $table = 'punishments';

    public $timestamps = false;

    public function reportedUser () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reportedBy () {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function punishementReason () {
        return $this->hasOne(Report::class);
    }
}
