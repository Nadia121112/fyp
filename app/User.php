<?php

use App\Subject;
use App\AttendanceList;

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function attendance_list()
    {
        return $this->hasMany(AttendanceList::class);
    }


    // protected $hidden = [
    //     'password', 'remember_token',
    // ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'userid', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengguna() {
        return $this->hasOne(Pengguna::class, 'user_id');
    }


}
