<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplied;
use Auth;

class JobAppliedController extends Controller
{
    public function appliedList($job_id)
    {   
        $appliedList = JobApplied::where('job_id',$job_id)->get();
        return view('appliedList',compact('appliedList'));
    }

    public function apply(Request $request)
    {   
        $request->validate([
            'filename' => 'required|mimes:pdf|max:2048',
            'user_id' => 'required',
            'job_id' => 'required',
        ]);
    
        $fileName = time().'.'.$request->file('filename')->extension();  
    
        $request->file('filename')->move(public_path('uploads'), $fileName);
    
        $appliedList = JobApplied::create([
            'user_id' => $request->user_id,
            'job_id' => $request->job_id,
            'filename' => $fileName,
        ]);
    
        return redirect()->route('Job')->with('success', 'Job application submitted successfully.');
    }
    
    

}    


