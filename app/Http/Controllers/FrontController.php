<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\Banner;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function Job()
    {
        $data = [];
        $data['job_category'] = JobCategory::all();
        $data['job'] = job::all();
        $data['banner'] = Banner::get();
        return view('/welcome')->with($data);
    }
    


}