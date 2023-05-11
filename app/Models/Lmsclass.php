<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lmsclass extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'classtype',
        'paytype',
        'teacher_id',
        'batch_id',
        'course_id',
        'lesson',
        'image',
        'doc',
        'link',
        'available_days',
        'no_of_views',
        'level',
        'password',
        'status',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
