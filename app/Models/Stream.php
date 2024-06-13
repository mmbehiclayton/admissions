<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_class_id'];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function learners()
    {
        return $this->hasMany(Learner::class);
    }
}
