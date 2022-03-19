<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'order',
        'school_id',
    ];

    public $casts = [
        'order' => 'float'
    ];

    public function schools(){
        return $this->belongsTo(School::class,'school_id')->withTrashed();
    }
}
