<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // protected $fillable = [
  //   'title', 'slug', 'excerpt', 'body'
  // ];    // field2 apa saja yg bisa diisi (non auto-filled) -- kebalikan dari `$guarded`

  protected $guarded = [
    'id'
  ];    // field2 apa saja yg ga boleh diisi


  // auto bawa relasi dari model lain
  protected $with = ['category', 'author'];   

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function author() {            // using alias author as another obj name of user
    return $this->belongsTo(User::class, 'user_id');    // cara menghubungkannya field 'user_id' dijadikan penghubung ke User
  }
}
