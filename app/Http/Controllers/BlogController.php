<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogData = Blog::Paginate(3);
        return view('admin.blog.index',compact('blogData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogData =BlogCategory::get();
        return view('admin.blog.create',compact('blogData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogData = new Blog();
        $blogData->blog_category_id = $request->blog_category_id;
        $blogData->title = $request->title;
        $blogData->tags = $request->tags;
        $blogData->description = $request->description;
        // *Image innervations
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalName();
            Image::make($file)->resize(430,327)->save('upload/blog/'.$fileName);
            $save_url = 'upload/blog/'.$fileName;
            $blogData->image = $save_url;
        }
        $blogData->save();
        $notification = array('message'=>'Blog category created Successfully', 'alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogCateData =BlogCategory::get();

        $blogData = Blog::findOrFail($id);
        // dd($blogData);
        return view('admin.blog.edit',compact('blogCateData','blogData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $blogData = Blog::findOrFail($id);
        $blogData->blog_category_id = $request->blog_category_id;
        $blogData->title = $request->title;
        $blogData->tags = $request->tags;
        $blogData->description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalName();
            Image::make($file)->resize(430,327)->save('upload/blog'.$fileName);
            $save_url = 'upload/blog'.$fileName;
            $blogData->image = $save_url;
        }
        $blogData->save();
        $notification = array('message'=>'Blog updated Successfully', 'alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogData = Blog::findOrFail($id);
        // dd($blogData);
        $img = $blogData->image;
        $path= public_path('upload/blog/'.$img);

        if (File::exists($path)) {
            unlink($path);
        }

        Blog::findOrFail($id)->delete();
        $notification = array('message'=>'Blog delete Successfully', 'alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }


}
