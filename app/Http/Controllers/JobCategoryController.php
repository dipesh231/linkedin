<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;


class JobCategoryController extends Controller
{
    public function jobCategory(){
        $job_category = JobCategory::all();
        return view('jobCategory',compact('job_category'));
    }

    public function addJob(Request $request)
    {
        $jobCategory = JobCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('job-category');
    }
    
    public function editJob($id){
        $job_category = JobCategory::find($id);
        return view('jobCategoryUpdate', compact('job_category'));
        
    }

    public function update(Request $request, $id)
{   
    $job_category = JobCategory::find($id);
    $job_category->name = $request->input('name');
    $job_category->save();

    return redirect()->route('job-category')->with('success', 'Job category updated successfully.');
}

    public function  delete($id)
    {
        $job_category = JobCategory::find($id);
        $job_category->delete();

        return redirect()->route('job-category')->with('success', 'Job category deleted successfully.');

    }
}
