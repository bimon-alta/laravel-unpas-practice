<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::factory(3)->create();

      // \App\Models\User::factory(10)->create();     // Conventional way, works !!

      // User::create([
      //   'name' => 'John Doe',
      //   'email' => 'johndoe@gmail.com',
      //   'password' => bcrypt('12345'),
      //   'is_admin' => false
      // ]);
      // User::create([
      //   'name' => 'Paijem',
      //   'email' => 'paijem@gmail.com',
      //   'password' => bcrypt('12345'),
      //   'is_admin' => true
      // ]);
      // User::create([
      //   'name' => 'Wagiman',
      //   'email' => 'wagiman@gmail.com',
      //   'password' => bcrypt('12345'),
      //   'is_admin' => false
      // ]);




      Category::create([
        'name' => 'Web Programming',
        'slug' => 'web-programming'
      ]);

      Category::create([
        'name' => 'Web Design',
        'slug' => 'web-design'
      ]);

      Category::create([
        'name' => 'Personal',
        'slug' => 'personal'
      ]);


      Post::factory(20)->create();

      // Post::create([
      //   'title' => 'Judul Pertama',
      //   'slug' => 'judul-pertama',
      //   'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error soluta cumque a assumenda ipsum fuga illum aliquid dolore adipisci illo fugit dignissimos possimus quasi facilis harum quae omnis',
      //   'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error soluta cumque a assumenda ipsum fuga illum aliquid dolore adipisci illo fugit dignissimos possimus quasi facilis harum quae omnis cupiditate nesciunt impedit, ad commodi in deleniti! Iste inventore explicabo, impedit asperiores cupiditate voluptate quidem rerum nemo doloribus aperiam error veniam doloremque incidunt, dolores, repellat consequuntur hic ipsa aliquam. </p><p>Delectus, minima culpa, iusto nulla totam fugiat natus optio sapiente cum corporis consequatur praesentium dignissimos alias quod. Distinctio consequatur quidem porro obcaecati harum.</p>',
      //   'category_id' => 1,
      //   'user_id' => 1
      // ]);

      // Post::create([
      //   'title' => 'Judul Kedua',
      //   'slug' => 'judul-kedua',
      //   'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis eaque nostrum quis, adipisci autem repudiandae. Facilis animi dolores quos perspiciatis nemo quidem maxime ad! Reprehenderit inventore quis iusto! Rerum',
      //   'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis eaque nostrum quis, adipisci autem repudiandae. Facilis animi dolores quos perspiciatis nemo quidem maxime ad! Reprehenderit inventore quis iusto! Rerum odio accusantium necessitatibus ullam ipsa error, culpa sequi architecto dolor sunt porro impedit voluptates, tempore aut nesciunt facere illo! <p></p>Quisquam illum soluta eum dolor aut tempora accusamus, suscipit doloribus est harum neque atque, aperiam distinctio ex quam corporis iste consequuntur repellendus dolore? Ad laborum autem eveniet perspiciatis reiciendis, dicta unde nesciunt molestiae enim libero, consequuntur provident tenetur ratione voluptates? Tenetur consectetur ad consequuntur atque non doloremque quasi corrupti. Odit, quibusdam laboriosam!</p>',
      //   'category_id' => 2,
      //   'user_id' => 1
      // ]);

      // Post::create([
      //   'title' => 'Judul Ketiga',
      //   'slug' => 'judul-ketiga',
      //   'excerpt' => 'Postingan Ketiga yang isinya sungguh',
      //   'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam id eaque magni alias corrupti a delectus, quia consequatur velit quo provident ducimus, magnam cum aliquam perspiciatis modi atque laboriosam dolorum? Esse unde accusantium nostrum libero fugiat vel. Ex adipisci facilis tempora dignissimos. Reiciendis amet id esse sunt commodi magnam sequi reprehenderit deleniti dolorum, aperiam dolorem quibusdam velit enim, iste eius ut porro. Voluptate, veniam maiores recusandae adipisci debitis quidem accusamus est enim minima quisquam iste culpa cupiditate natus magnam eius consequuntur error necessitatibus quae hic! Ducimus facere dolore et esse numquam nemo, obcaecati quaerat eveniet. Repellat aperiam odio odit pariatur non expedita recusandae neque, minus molestiae ea? Atque et minima beatae maiores non aliquam fugiat ducimus, repellat, aperiam eligendi debitis aut? Praesentium tempora harum ratione odio nemo dicta eum, exercitationem, voluptatum minima repellendus laboriosam sed repudiandae blanditiis labore. Velit blanditiis doloribus ex labore qui magnam. Totam sequi rerum, at amet quos animi obcaecati voluptas accusamus, sapiente architecto assumenda numquam mollitia nostrum aut officia, dignissimos alias deserunt aliquid quaerat tenetur odio reprehenderit tempore similique minima.</p><p>Animi id, officia perferendis totam quidem, consectetur nam assumenda aperiam quaerat sed illo nemo rem cum! Repellat enim dolorum quis iure doloremque sit hic, repellendus officia, sunt aut aliquid nesciunt autem ipsam rerum voluptates veritatis nulla, quos accusamus nihil ad. Deleniti autem laborum facilis ex aliquam labore nemo vero deserunt sapiente corrupti, placeat sequi qui accusamus accusantium, voluptatibus a, nisi nam odit. Id veniam fuga amet reiciendis eos corrupti itaque, corporis dolorem dolores quaerat voluptate officia perferendis quisquam labore fugiat, soluta nemo ullam, adipisci unde. Veniam totam vitae reiciendis atque autem. Delectus saepe aperiam similique. </p><p>Architecto temporibus autem rerum incidunt nostrum eum debitis, ipsa natus quisquam doloremque cupiditate, expedita itaque et earum pariatur commodi at accusantium eveniet. Voluptas cupiditate, quibusdam nulla fuga enim velit asperiores voluptates.</p>',
      //   'category_id' => 2,
      //   'user_id' => 2
      // ]);

      // Post::create([
      //   'title' => 'Judul Keempat',
      //   'slug' => 'judul-keempat',
      //   'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque omnis eum nisi, ea, a, facilis voluptas aliquid corrupti numquam nostrum ipsa ad repellendus deserunt facere consequuntur.',
      //   'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque omnis eum nisi, ea, a, facilis voluptas aliquid corrupti numquam nostrum ipsa ad repellendus deserunt facere consequuntur. Perferendis voluptatum facere non necessitatibus, sunt totam dolorum et a pariatur minus velit numquam praesentium quibusdam incidunt.</p><p> Ea sequi similique soluta laborum voluptatum ipsam. Provident illum nesciunt impedit qui possimus nulla optio quia facilis error voluptatem eligendi quam cum nobis soluta delectus dicta assumenda doloribus dolores quis nisi magni vero, consequuntur dolorem repellendus. Itaque sint assumenda necessitatibus veritatis suscipit cumque harum, sequi nam vel quam, quo qui, pariatur tempora voluptas hic!</p><p>Rerum consequatur similique voluptatem enim eveniet magni, facere ad quaerat, repellendus non voluptas illo provident hic sunt ducimus nostrum maiores quasi sapiente id iure saepe nam ratione vel aperiam. Eveniet recusandae quas provident quod eum enim ab eaque minus labore. Provident molestias ad quam, debitis nihil obcaecati voluptatibus? Quis quia minus delectus consequuntur ducimus et eius dicta eaque earum at corporis, impedit molestiae similique. Praesentium autem mollitia nam deserunt tempora fugiat animi adipisci perspiciatis, voluptatibus quis aspernatur atque earum rem culpa officia error qui velit possimus officiis ipsa? Sunt eveniet et sed ipsa, dolor, impedit doloribus laborum molestias a natus labore. Voluptatum, et.</p>',
      //   'category_id' => 1,
      //   'user_id' => 3
      // ]);
      
    }
}
