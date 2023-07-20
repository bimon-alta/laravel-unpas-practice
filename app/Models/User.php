<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   * 
   * @var array
   */
  protected $fillable = [
      'name', 'username', 'email', 'password', 'is_admin'
  ];    // field2 apa saja yg bisa diisi (non auto-filled)

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];    // field2 yg otomatis tidak disertakan ketika di-get

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function posts(){
    return $this->hasMany(Post::class);
  }
}
