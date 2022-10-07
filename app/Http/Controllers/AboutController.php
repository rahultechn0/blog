<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;
class AboutController extends Controller
{

    public function index()
    {
        $multiImage = MultiImage::paginate(3);
        return view('admin.multiImage.index',compact('multiImage'));
    }

    public function about()
    {
        $about = About::findOrFail(1);
        return view('admin.about.aboutUpdate', compact('about'));
    }


    public function create()
    {
        return view('admin.multiImage.create');
    }

    public function store(Request $request)
    {
        if ($request->file('multi_image')) {
            $img = $request->file('multi_image');
            foreach($img as $multiImage){
                $fileName = hexdec(uniqid()).'.'.$multiImage->getClientOriginalName();
                Image::make($multiImage)->resize(220,220)->save('upload/multi/'.$fileName);
                $save_url = 'upload/multi/'.$fileName;
                MultiImage::insert([
                    'multi_image' => $save_url,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        $notification = array('message'=>'multi image Uploaded Successfully', 'alert-type'=>'success');
        return redirect()->route('index.multi.image')->with($notification);
    }

    public function update(Request $request)
    {
        $about = About::findOrFail(1);
        $about->title = $request->title;
        $about->short_title = $request->short_title;
        $about->short_des = $request->short_des;
        $about->long_des = $request->long_des;

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/about'),$fileName);
            $about['image'] = $fileName;
        }
        $about->save();
        $notification = array('message'=>'About us page Update Successfully', 'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.multiImage.edit',compact('multiImage'));
    }
    public function updateImage(Request $request,$id)
    {
        $multiImage = MultiImage::findOrFail($id);
        if ($request->file('multi_image')) {
            $img = $request->file('multi_image');
            $fileName = hexdec(uniqid()).'.'.$img->getClientOriginalName();
            Image::make($img)->resize(220,220)->save('upload/multi/'.$fileName);
            $save_url = 'upload/multi/'.$fileName;
            $multiImage->update([
                'multi_image' => $save_url,
            ]);
        }
        $notification = array('message'=>'Image Updated Successfully', 'alert-type'=>'success');
        return redirect()->route('index.multi.image')->with($notification);
    }
    public function destroy($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        $img = $multiImage->multi_image;
        if (File::exists($img)) {
            unlink($img);
        }
        MultiImage::findOrFail($id)->delete();

        $notification = array('message'=>'Blog delete Successfully', 'alert-type'=>'success');
        return redirect()->route('index.multi.image')->with($notification);
    }


}
