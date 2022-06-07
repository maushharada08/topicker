<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $imagePath = ( $this->image ) ? "/storage/". $this->image : "/storage/profiles/szePiXR5FsjICY8ZWqLVLfX6YLSIi2UqY9oEidDW.jpg";
        return $imagePath;
    }

    public function logo()
    {
        $imagePath = ( $this->logo ) ? "/storage/". $this->logo : $this->com_name;
        return $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
