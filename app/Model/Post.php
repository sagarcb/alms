<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'dept_info_id',
        'alumni_id',
        'post',
    ];

    public function alumniBasicInfo()
    {
        return $this->belongsTo(AlumniBasicInfo::class,'alumni_id','alumni_id');
    }

    public function alumniPersonalInfo()
    {
        return $this->belongsTo(AlumniPersonalInfo::class,'alumni_id','alumni_id');
    }
}
