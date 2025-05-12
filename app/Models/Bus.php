<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_plate',
        'driver',
        'assistant',
        'route',
        'capacity',
    ];

    public function learners()
    {
        return $this->hasMany(Learners::class); // assumes Learner has a `bus_id` foreign key
    }

}
