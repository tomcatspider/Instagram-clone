<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\profile;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('post.create');
    }
    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');
        $image=image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

  
    public function show(\App\Models\Post $post){
        return view("post.show", compact('post'));
    }
    
}
