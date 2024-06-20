<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function streams()
    {
        return $this->hasMany(Streams::class);
    }
    
    public function branches()
    {
        return $this->belongsTo(Branch::class);
    }

    public function learners(){
        return $this->hasMany(Learners::class);
    }

    
}
