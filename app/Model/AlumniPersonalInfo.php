<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlumniPersonalInfo extends Model
{
    protected $fillable = [
        'alumni_id',
        'mailing_address',
        'district',
        'upazilla',
        'permanent_address',
        'current_country',
        'permanent_country',
        'father_name',
        'mother_name',
        'birth_date',
        'photo_link',
        'facebook_link'
    ];

    public function alumniBasicInfo()
    {
        return $this->belongsTo(AlumniBasicInfo::class,'alumni_id','alumni_id');
    }
}
