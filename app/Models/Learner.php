<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adm_no',
        'gender',
        'dob',
        'birth_cert_no',
        'nationality',
        'nemis_code',
        'doa',
        'contact',
        'school_class_id', // Add this line
        'status' // Add this line if not already included
    ];

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }
}
