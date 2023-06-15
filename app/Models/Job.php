<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $table = 'Jobs';
    protected $fillable = [
        'company',
        'position',
        'started_at',
        'ended_at',
        'description',
        'user_id'
    ];
}
