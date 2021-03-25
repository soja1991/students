<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'age',
        'gender',
        'teacher_id'
    ];
    
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
    public function mark()
    {
        return $this->hasOne('App\Models\Mark');
    }
}
