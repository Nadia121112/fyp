<?php

namespace App;

use App\User;
use App\Daftarsubjek;
use App\AttendanceList;
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

    public function attendance_lists()
    {
        return $this->hasOne(AttendanceList::class);
    }
    
    public function daftarsubjek(){

      return $this->hasMany(Daftarsubjek::class);
    }



    // public function likes()
    // {
    //     return $this->belongsToMany(User::class, 'likes');
    // }

}
