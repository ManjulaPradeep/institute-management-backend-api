<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StParent extends Model
{
    use HasFactory;

    protected $fillable = ['name','contact','email'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
