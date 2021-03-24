<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    protected $table = 'categories';

    public $timestamps = false;

    public function announcements () {
        return $this->belongsToMany(Announcement::class, 'announcement_categories');
    }

    public function knowledges () {
        return $this->belongsToMany(User::class, 'knowledges');
    }
}
