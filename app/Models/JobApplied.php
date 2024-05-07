<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplied extends Model
{
    protected $fillable = [
        'user_id',
        'job_id',
        'filename'
    ];

    public function getJobId()
    {
        return $this->belongsTo(job::class,'job_id','id');
    }

    public function getUserId()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

