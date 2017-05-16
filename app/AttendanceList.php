<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceList extends Model
{
  protected $fillable = [
      'nomatrik','namapelajar' ,'kursus'
   ];

   protected $attributes = [
     'nomatrik'=> " ", 'namapelajar'=> " ", 'kursus' => " "
   ];


}
