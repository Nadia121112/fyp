<?php
namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Pengguna extends Model
{
  protected $fillable = ['user_id', 'nama', 'telefon', 'alamat', 'gambar'];
  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
