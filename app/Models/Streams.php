<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streams extends Model
{
    use HasFactory;

    protected $table = 'stream';

    public function classes(){
        return $this->belongsTo(Classes::class, 'classes_id');
    }
    public function learners(){
        return $this->hasMany(Learners::class);
    }

    
    

}

