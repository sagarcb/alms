<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'notice_name',
        'notice_date',
        'notice_details',
        'dept_info_id',
        'dept_admin_id'
    ];
}
