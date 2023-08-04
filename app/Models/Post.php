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


  // SCOPE --- custom function to filter data
  public function scopeFilter($query, array $filters){
    
    // // BASIC FILTERING
    // if (isset($filters['search']) ? $filters['search'] : false ) {
    //   return $query->where('title', 'like', '%' . $filters['search'] . '%')
    //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');

    //   // dd($posts->get());
    // }


    // USING WHEN() and NULL COALESCING OPERATOR
    // simplified isset() and ternary operator, jika tdk ada filters maka return FALSE
    // jika ada maka $query masuk args1, $filter['search'] masuk args2
    $query->when($filters['search'] ?? false, function($query, $search){
      return $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%');
    });



    // MULTI PARAMS FILTERING
    // pencarian keyword by category
    $query->when($filters['category'] ?? false, function($query, $category){

      // whereHas melakukan relationship ke category
      // use ($category) digunakan untuk mengambil params dgn nama sama dr parent nya
      // di JS kurleb mirip penggunaan this. binding
      return $query->whereHas('category', function($query) use ($category){
        
        $query->where('slug', $category);

      });
    });


    // arrow function
    // whereHas melakukan relationship ke author
    $query->when($filters['author'] ?? false, fn($query, $author) => 
      $query->whereHas('author', fn($query) => 
          $query->where('username', $author) )
    );


  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function author() {            // using alias author as another obj name of user
    return $this->belongsTo(User::class, 'user_id');    // cara menghubungkannya field 'user_id' dijadikan penghubung ke User
  }
}
