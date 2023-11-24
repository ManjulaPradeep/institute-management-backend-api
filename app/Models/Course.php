<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id';

    // protected $fillable = [
    //     'name',
    //     'credits',
    //     'start',
    //     'end',
    //     'no_of_students'
    // ];

    protected $fillable = [
        'name',
        'credits',
        'start',
        'end',
        'no_of_students',
        'lecturer_id',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}
