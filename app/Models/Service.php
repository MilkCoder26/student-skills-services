<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title',
        'description',
        'price',
        'student_id',
        'category_id',
        'price_range',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}