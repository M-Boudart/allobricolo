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

    public function applicant () {
        return $this->belongsTo(User::class, 'applicant_user_id');
    }

    public function locality () {
        return $this->belongsTo(locality::class);
    }

    public function reviews () {
        return $this->hasMany(Review::class);
    }

    public function categories () {
        return $this->belongsToMany(Announcement::class, 'announcement_categories');
    }

    public function helpers () {
        return $this->belongsToMany(User::class, 'helpers');
    }

    public function payment () {
        return $this->hasOne(Payment::class, 'announcement_id');
    }
}
