<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class profile extends Model
{
    protected $guarded=[];
   
  public function profileimage(){
      $imagepath=($this->image) ? $this->image:'profile/JBRlnGFtiLEvgCaTp4Z4jZoEp0ystBdIeWfwpUaJ.jpg'; 
      return  '/storage/'. $imagepath;
  }
  public function follower(){
    return $this->belongsToMany(User::class);
}
    public function user()
    {
        return $this->belongsTo(User::class);

    }
    
}
