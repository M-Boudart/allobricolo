<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_id',
        'note',
        'description',
    ];

    protected $table = 'reviews';

    public $timestamps = false;

    public function announcement () {
        return $this->belongsTo(Announcement::class);
    }
}
