<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
class Post{
  // use HasFactory;

  private static $blog_posts = [
    [
      "title" => "Judul Post Pertama",
      "slug" => "judul-post-pertama",
      "author" => "Tukimin Sastrorejo",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error soluta cumque a assumenda ipsum fuga illum aliquid dolore adipisci illo fugit dignissimos possimus quasi facilis harum quae omnis cupiditate nesciunt impedit, ad commodi in deleniti! Iste inventore explicabo, impedit asperiores cupiditate voluptate quidem rerum nemo doloribus aperiam error veniam doloremque incidunt, dolores, repellat consequuntur hic ipsa aliquam. Delectus, minima culpa, iusto nulla totam fugiat natus optio sapiente cum corporis consequatur praesentium dignissimos alias quod. Distinctio consequatur quidem porro obcaecati harum."
    ],
    [
      "title" => "Judul Post Kedua",
      "slug" => "judul-post-kedua",
      "author" => "Warsini Suryokonto",
      "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis eaque nostrum quis, adipisci autem repudiandae. Facilis animi dolores quos perspiciatis nemo quidem maxime ad! Reprehenderit inventore quis iusto! Rerum odio accusantium necessitatibus ullam ipsa error, culpa sequi architecto dolor sunt porro impedit voluptates, tempore aut nesciunt facere illo! Quisquam illum soluta eum dolor aut tempora accusamus, suscipit doloribus est harum neque atque, aperiam distinctio ex quam corporis iste consequuntur repellendus dolore? Ad laborum autem eveniet perspiciatis reiciendis, dicta unde nesciunt molestiae enim libero, consequuntur provident tenetur ratione voluptates? Tenetur consectetur ad consequuntur atque non doloremque quasi corrupti. Odit, quibusdam laboriosam!"
    ]
  ];

  // static artinya untuk manggil tidak perlu instansiasi Class ($obj_01 = new Class(bla bla) )
  // cara panggil prop/method static adalah dengan `::` (titik dua 2x)
  // jika prop/method tsb bukan static maka bisa dipanggil dengan `->`, mirip dengan dot `.` pd java atau js
  public static function all(){
    return self::$blog_posts;     // self mirip seperti `this` pada java atau js
  }

  public static function find($slug){
    
    // CONVENTIONAL WAY
    // $posts = self::$blog_posts;
    // $post = [];
    // foreach( $posts as $p){
    //   if( $p['slug'] === $slug ){
    //     $post = $p;
    //   }
    // }

    // BETTER WAY - using collection (WRAPPER OF ARRAY to give an advanced functionality)
    $posts = collect(self::$blog_posts);
    

    return $posts->firstWhere('slug', $slug);
  }

}
