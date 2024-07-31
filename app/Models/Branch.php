<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';

    public function classes()
    {
        return $this->hasMany(Classes::class, 'branch_id');
    }

    public function streams()
    {
        return $this->hasManyThrough(Streams::class, Classes::class, 'branch_id', 'classes_id', 'id', 'id');
    }
}

