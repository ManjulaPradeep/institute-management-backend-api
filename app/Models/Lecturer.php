<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Lecturer extends Model
{
    use HasFactory;

    protected $primaryKey = 'lecturer_id';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'nic',
        'address',
        'contact',
        'email',
        'lecturer_id',
    ];

    public function course(){
        return $this->hasMany(Course::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'lecturer_id'); 
    }
}
