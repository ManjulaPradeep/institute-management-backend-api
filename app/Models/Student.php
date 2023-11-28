<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Generator\ClassIsFinalException;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';
    protected $guarded = [];


    protected $fillable = [
        'name',
        'reg_no',
        'nic',
        'address',
        'contact',
        'email',
    ];

    public function course(){
        return $this->hasMany(Course::class);
    }
    public function result(){
        return $this->hasMany(Result::class);
    }
    public function st_parent(){
        return $this->belongsTo(StParent::class);
    }
}


