<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlumniJobInfo extends Model
{
    protected $fillable = [
        'alumni_id',
        'cv_link',
        'current_position',
        'company_name',
        'job_category'
    ];

    public function alumniBasicInfo()
    {
        return $this->belongsTo(AlumniBasicInfo::class,'alumni_id','alumni_id');
    }
}
