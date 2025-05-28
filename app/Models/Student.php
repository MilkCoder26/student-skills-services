<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'classe',
        'niveau',
        'competence',
        'sexe',
        'skills',
        'email',
        'phone_number',
        'bio',
    ];

    protected $casts = [
    'skills' => 'array',
    ];
}