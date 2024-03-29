<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'marks',
        'grade'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function student(){
        return $this->hasMany(Student::class);
    }
}
