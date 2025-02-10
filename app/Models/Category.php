<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_of_the_course_area'];

    protected $table = 'categories';

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
