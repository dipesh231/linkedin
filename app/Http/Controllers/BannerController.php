<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    public function banner(){
        $banner = Banner::all();
        return view('banner',compact('banner'));

    }
    public function addBanner(Request $request)
    {
        $request->validate([

            'banner_title' => 'required',
            'banner_image' => 'required|mimes:pdf,jpeg,jpg,png'
        ]);

        $fileName = time().'.'.$request->file('banner_image')->extension();

        $request->file('banner_image')->move(public_path('uploads'), $fileName);

        $banner = Banner::create([
            'banner_title' => $request->banner_title,
            'banner_image' => $fileName,
        ]);

        return redirect()->route('Banner')->with('success', 'Banner added successfully.');
    }

    public function editBanner($id){
        $banner = Banner::find($id);
        return view('banner',compact('banner'));
    }
}
