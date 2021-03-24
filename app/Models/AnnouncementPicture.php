<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_id',
        'picture_url',
    ];

    protected $table = 'announcement_pictures';

    public $timestamps = false;

    public function announcement () {
        return $this->belongsTo(Announcement::class);
    }
}
