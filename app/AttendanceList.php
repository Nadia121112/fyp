<?php

namespace App;
use App\Subject;
use App\Student;
use App\User;



use Illuminate\Database\Eloquent\Model;

class AttendanceList extends Model
{
  protected $fillable = [
      'date','nomatrik' ,'kursus'
   ];

  //  protected $attributes = [
  //    'nomatrik'=> " ", 'namapelajar'=> " ", 'kursus' => " "
  //  ];


   public function User () {
     return $this->belongsTo(User::class);
   }

   public function subject () {
     return $this->belongsTo(Subject::class);
   }

   public function student () {
     return $this->belongsTo(Student::class);
   }


}
