<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'event_name',
      'event_date',
      'event_details',
      'dept_info_id',
      'dept_admin_id'
    ];
}
