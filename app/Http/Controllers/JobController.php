<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function Job()
    {
        $job_category = JobCategory::all();
        $job = job::all();
        return view('job',compact('job','job_category'));

    }

    public function addJob(Request $request)
    {
        $job = job::create([
            'name' => $request->name,
            'description' => $request->description,
            'job_category_ID' => $request->job_category_ID,
            'total_seats' => $request->total_seats,
        ]);

        return redirect()->route('Job');
    }

    public function editJob($id)
    {
        $job_category = JobCategory::all();
        $job = job::find($id);
        return view('jobUpdate', compact('job','job_category'));

    }

    public function update(Request $request, $id)
{
    $job = job::find($id);
    $job->name = $request->input('name');
    $job->description = $request->input('description');
    $job->job_category_ID = $request->input('job_category_ID');
    $job->total_seats = $request->input('total_seats');
    $job->save();
    return redirect()->route('Job')->with('success', 'Job category updated successfully.');
}

public function  delete($id)
{
    $job = job::find($id);
    $job->delete();

    return redirect()->route('Job')->with('success', 'Job category deleted successfully.');

}
}
