<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;


class ImageController extends Controller
{
    public function upload(Request $image)
    {
    	$this->validate($image,[
    		'image' => 'required|image|mimes:jpeg,jpg,png,bmp,svg,gif|max:2048',
    	]);

    	$imageName = time().'.'.$image->image->getClientOriginalExtension();
    	$image->image->move(public_path('images'),$imageName);
    	Image::create(['path'=>$imageName]);
    	return back()->with('success','Image Successfully Uploaded')->with('path',$imageName);
    }

    public function index()
    {
    	return view('file');
    }
}
