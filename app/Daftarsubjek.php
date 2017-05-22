<?php

namespace App;
use App\User;
use App\Subject;

use Illuminate\Database\Eloquent\Model;

class Daftarsubjek extends Model
{
    protected $fillable = [
      'user_id', 'subject_id'
    ];


    public function user(){

      return $this->belongsTo(User::class);
    }

    public function subject(){
      return $this->belongsTo(Subject::class);
    }



}
