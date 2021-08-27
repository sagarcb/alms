<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeptInfo extends Model
{
    protected $fillable = ['dept_code','dept_name','faculty_name'];

    public function dept_admins()
    {
        return $this->hasMany(DeptAdmin::class,'dept_code','dept_code');
    }

    public function programs()
    {
        return $this->hasMany(ProgramInfo::class,'dept_info_id','id');
    }

    public function alumniBasicInfo()
    {
        return $this->hasMany(AlumniBasicInfo::class,'dept_info_id','id');
    }
}
