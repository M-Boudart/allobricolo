<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'login',
        'firstname',
        'lastname',
        'description',
        'avatar',
        'status_id',
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function status () {
        return $this->belongsTo(Status::class);
    }

    public function announcements () {
        return $this->hasMany(Announcement::class, 'applicant_user_id');
    }

    public function knowledges () {
        return $this->belongsToMany(Category::class, 'knowledges');
    }

    public function helpers () {
        return $this->belongsToMany(Announcements::class, 'helpers');
    }

    public function helpProposal () {
        return $this->hasMany(Helper::class, 'helper_id');
    }

    public function reports () {
        return $this->hasMany(Punishment::class);
    }

    public function reporters () {
        return $this->hasMany(Punishment::class);
    }

    public function hasReported () {
        return $this->hasMany(Report::class, 'reported_by');
    }

    public function hasBeenReportedFor () {
        return $this->hasMany(Report::class, 'object_id');
    }
}
