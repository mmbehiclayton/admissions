<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'branch_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }
}
