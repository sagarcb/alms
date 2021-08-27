<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlumniAcademicInfo extends Model
{
    protected $fillable = [
        'alumni_id',
        'passing_year',
        'passing_semester',
        'program_info_id',
        'batch'
    ];

    public function alumniBasicInfo()
    {
        return $this->belongsTo(AlumniBasicInfo::class, 'alumni_id','alumni_id');
    }
}
