<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;
use Intervention\Image\Facades\Image;
class ProfileController extends Controller
{
    public function index(User $user){
        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) : false;
       
        

        return view('profile.index', compact('user','follows'));

    }
    public function edite(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.edite', compact('user'));
    }
    public function update(User $user){
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);
   
  

if(request('image')){
      
    $imagePath = request('image')->store('profile', 'public');
    $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
    $image->save();
$imagearray=['image'=>$imagePath];

}

auth()->user()->profile->update(array_merge(
    $data,
    $imagearray ?? []
));
    return redirect("/profile/{$user->id}");

    }
}