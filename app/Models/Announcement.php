<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_user_id',
        'title',
        'address',
        'locality_id',
        'price',
        'description',
        'phone',
        'created_at',
        'realised_at',
    ];

    protected $table = 'announcements';

    public $timestamps = false;

    public function pictures () {
        return $this->hasMany(AnnouncementPicture::class);
    }

    public function apllicant () {
        return $this->belongsTo(User::class);
    }
}
