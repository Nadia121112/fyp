<?php

namespace App;

use App\Like;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $fillable = [
        'codesubject'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function likes()
    // {
    //     return $this->belongsToMany(User::class, 'likes');
    // }

}
