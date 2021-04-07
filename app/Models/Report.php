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
}