<?php

namespace App\Models;

use App\Models\Academics\Performance;
use App\Models\Payments\FeePayment;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Structure\Stream;
use Illuminate\Database\Eloquent\Relations\HasMany;
use app\models\Academics\Exams;
use app\Models\Parents;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'roll',
        'blood_group',
        'religion',
        'email',
        'class',
        'section',
        'admission_id',
        'phone_number',
        'upload',
        
    ];
    function Stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class);
    }
    public function Subjects() {
        return $this->belongsToMany(Subject::class);
    }
    public function Exams(): HasMany {
        return $this->hasMany(Exams::class); 
    }

    public function Parent():HasOne {
        return $this->hasOne(Parents::class);
    }

    public function Performance(): HasMany {
        return $this->hasMany(Performance::class);
    }

    public function FeePayment(): HasMany {
        return $this->hasMany(FeePayment::class);
    }


    public static function getStudentsOfAGivenClass(){
        return DB::table('students')
    
        ->leftjoin('stream', 'stream.id', '=', 'students.id')
        ->select(
          'students.*',
         'stream.name as name',
         )
        ->orderBy('students.id', 'desc')
        ->get();
    }
}
