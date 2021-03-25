<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_id',
        'card_nummer',
        'ammount',
        'payed_at',
    ];

    protected $table = 'payments';

    public $timestamps = false;

    public function announcement () {
        return $this->belongsTo(Announcement::class);
    }
}
