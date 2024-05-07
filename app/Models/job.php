<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'job_category_ID',
        'total_seats',
    ];

    public function getJobCategory()
    {
        return $this->belongsTo(JobCategory::class,'job_category_ID','id');
    }

}
