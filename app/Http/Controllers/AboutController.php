<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutContent;

class AboutController extends Controller
{
     public function about()
    {
        $about = AboutContent::first(); 

        $features = $about->features ?? [];


        return view('about', compact('about' , 'features'));
    }

            
        public function adminAbout()
        {
            $about = AboutContent::first(); 
            $features = $about->features ?? [];

            return view('adminpages.about', compact('about', 'features'));
        }

        public function edit()
            {
                $about = AboutContent::first();
                $features = $about->features ?? [];
                return view('adminpages.about_edit', compact('about', 'features'));
            }

            public function update(Request $request)
                {
                    $about = AboutContent::first();

                    $about->main_title = $request->main_title;
                    $about->main_description = $request->main_description;
                    $about->mission_title = $request->mission_title;
                    $about->mission_content_1 = $request->mission_content_1;
                    $about->mission_content_2 = $request->mission_content_2;

                      if ($request->hasFile('main_image')) {
        $file = $request->file('main_image');
        $filename = time() . '_main.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/about'), $filename);
        $about->main_image = $filename;
    }

    if ($request->hasFile('mission_image')) {
        $file = $request->file('mission_image');
        $filename = time() . '_mission.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/about'), $filename);
        $about->mission_image = $filename;
    }

    if ($request->hasFile('mission_bg_image')) {
        $file = $request->file('mission_bg_image');
        $filename = time() . '_missionbg.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/about'), $filename);
        $about->mission_bg_image = $filename;
    }

                    $about->save();

                    return redirect()->route('admin.about')->with('success', 'About content updated successfully!');
                }

}
