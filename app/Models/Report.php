<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_id',
        'reported_by',
        'description',
        'reported_at',
    ];

    protected $table = 'reports';

    public $timestamps = false;

    public function reportedBy () {
        return $this->belongsTo(User::class, 'reported_by', 'id');
    }

    public function whoHasBeenReported () {
        return $this->belongsTo(User::class, 'object_author', 'id');
    }

    public function concernedPunishment () {
        return $this->hasOne(Punishment::class, 'reason');
    }
}
