<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramInfo extends Model
{
    protected $fillable = ['dept_info_id','program_id','program_title'];

    public function dept()
    {
        return $this->belongsTo(DeptInfo::class,'dept_info_id','id');
    }

    public function alumniBasicInfo()
    {
        return $this->hasMany(AlumniBasicInfo::class,'program_info_id','id');
    }
}
