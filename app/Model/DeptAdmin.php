<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeptAdmin extends Model
{
    protected $fillable = ['dept_admin_id','password','name','dept_code','dept_admin_status'];

    public function dept()
    {
        return $this->belongsTo(DeptInfo::class,'dept_code','dept_code');
    }
}
