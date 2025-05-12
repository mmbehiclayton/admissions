<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abbasudo\Purity\Traits\Filterable;

class Learners extends Model
{
    use Filterable;
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'stream_id',
        'assessment_no',
        'name',
        'admission_no',
        'gender',
        'dob',
        'bc_pp_entry_no',
        'nationality',
        'nemis_code',
        'date_of_addmission',
        'contact',
        'transport_route',
        'co_curricular_activity',

    ];

    public function streams(){
        return $this->belongsTo(Streams::class, 'stream_id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function branches() {
        return $this->belongsTo(Branch::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }



}
