<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $blogData =BlogCategory::Paginate(3);
        return view('admin.blogCategory.index',compact('blogData'));
    }

    public function create()
    {
        return view('admin.blogCategory.create');
    }

    public function Store(Request $request)
    {
        $blogData = new BlogCategory();
        $blogData->blog_cate = $request->blog_cate;
        $blogData->save();
        $notification = array('message'=>'Blog category created Successfully', 'alert-type'=>'success');
        return redirect()->route('blog.category.index')->with($notification);
    }

    public function edit($id)
    {
        $blogData = BlogCategory::findOrFail($id);
        return view('admin.blogCategory.edit',compact('blogData'));
    }

    public function update(Request $request,$id)
    {
        $blogData = BlogCategory::findOrFail($id);
        $blogData->blog_cate = $request->blog_cate;
        $blogData->save();
        $notification = array('message'=>'Blog category update Successfully', 'alert-type'=>'success');
        return redirect()->route('blog.category.index')->with($notification);
    }
    public function destroy($id)
    {
        $blogData = BlogCategory::find($id);
        $blogData->delete();
        $notification = array('message'=>'Blog category delete Successfully', 'alert-type'=>'success');
        return redirect()->route('blog.category.index')->with($notification);

    }
}
