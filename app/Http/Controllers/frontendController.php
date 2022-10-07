<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\MultiImage;
use App\Models\Slider;

class frontendController extends Controller
{
    public function index()
    {
        $images = MultiImage::limit(7)->latest()->get();
        // dd($images);
        $sliders = Slider::first();
        $abouts = About::first();
        $cat = BlogCategory::orderBy('blog_cate','ASC')->get();
        return view('frontend.index', compact('sliders', 'abouts','images'));
    }

    public function aboutShow()
    {
        $abouts = About::first();
        $blogs = Blog::limit(3)->latest()->get();
        return view('frontend.about', compact('abouts','blogs'));
    }

    public function blogShow()
    {
        $bolgCat = BlogCategory::orderBy('blog_cate','ASC')->get();
        $recentBlogs = Blog::skip(5)->take(5)->get();
        $blogs = Blog::limit(5)->latest()->get();
        return view('frontend.blog', compact('blogs','recentBlogs','bolgCat'));
    }

    public function detail($id)
    {
        $blogDetails = Blog::findOrFail($id);
        $bolgCat = BlogCategory::orderBy('blog_cate','ASC')->get();

        $recentBlogs = Blog::skip(5)->take(5)->get();
        return view('frontend.blog_detail',compact('blogDetails','bolgCat','recentBlogs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function store(ContactRequest $request)
    {
        $contacts = new Contact();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->subject = $request->subject;
        $contacts->budget = $request->budget;
        $contacts->message = $request->message;
        $contacts->save();

        $notification = array('message' => "Contact created Successfully", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
