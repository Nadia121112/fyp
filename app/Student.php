<?php

namespace App;

use App\AttendanceList;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
        'matricnum'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance_list()
    {
        return $this->hasMany(AttendanceList::class);
    }

    // public function subject()
    // {
    //   return $this->hasMany(Subject::class);
    // }


    // public function likes()
    // {
    //     return $this->belongsToMany(User::class, 'likes');
    // }

}
