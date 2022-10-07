<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{

    public function homeSlider()
    {
        $sliders = Slider::findOrFail(1);
        // dd($sliders);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function store(Request $request ,$id)
    {
        // $slider_id = $request->id;
        $sliders =Slider::findOrFail($id);
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->video = $request->video;

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/slider'), $fileName);
            $sliders['image'] = $fileName;
        }
        $sliders->save();

        $notification = array('message' => "Slider Update Successfully", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
