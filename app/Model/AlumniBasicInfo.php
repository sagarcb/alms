<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlumniBasicInfo extends Model
{
    protected $fillable = [
        'dept_info_id',
        'program_info_id',
        'alumni_id',
        'previous_alumni_id',
        'email_id',
        'name',
        'password',
        'mobile_number',
        'email_verification_code',
        'email_verification_status',
        'approve_status',
        'active_status'
    ];

    public function alumniJobInfo()
    {
        return $this->hasOne(AlumniJobInfo::class, 'alumni_id','alumni_id');
    }

    public function alumniPersonalInfo()
    {
        return $this->hasOne(AlumniPersonalInfo::class,'alumni_id','alumni_id');
    }

    public function alumniAcademicInfo()
    {
        return $this->hasOne(AlumniAcademicInfo::class,'alumni_id','alumni_id');
    }

    public function deptInfo()
    {
        return $this->belongsTo(DeptInfo::class,'dept_info_id','id');
    }

    public function programInfo()
    {
        return $this->belongsTo(ProgramInfo::class,'program_info_id','id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'alumni_id','alumni_id');
    }
}
