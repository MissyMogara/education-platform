<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'user_id', 'final_grade', 'comments'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
