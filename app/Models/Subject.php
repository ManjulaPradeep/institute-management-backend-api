<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'subject_id';
    protected $guarded = [];

    protected $fillable = ['subject_id','name'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lecuturer(){
        return $this->belongsTo(Lecturer::class);
    }
}
