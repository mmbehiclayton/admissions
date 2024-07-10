<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function streams()
    {
        return $this->hasMany(Streams::class, 'classes_id');
    }
    
    public function branches()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function learners(){
        return $this->hasMany(Learners::class);
    }

    
}
