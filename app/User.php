<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar','name', 'email', 'password',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }

    public static function uploadAvatar($image)
    {

            $name = $image->getClientOriginalName();
            (new self())->deleteOldImage($name);
           // save image on public
            $image->storeAs('images', $name,'public');
          //  User::find(2)->update(['avatar' => $name ] );
             auth()->user()->update(['avatar' => $name ] );


    }

    protected function deleteOldImage(){
        if($this->image){
            Storage::delete('/public/images/'.$this->image);
        }
    }
}
