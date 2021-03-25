<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'student_id',
        'maths_mark',
        'science_mark',
        'history_mark',
        'total_marks',
        'term_id'
    ];
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }
}
