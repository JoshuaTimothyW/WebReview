<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\Member::create([
            'name' => "test",
            'email' => "test@gmail.com",
            'role' => 'Member',
        ]);
        
        \App\Post::create([
            'user_id' => "1",
            'title' => "Ini Post pertama",
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed veritatis, aut perferendis, voluptatem error modi blanditiis officiis, nisi expedita cum voluptas nostrum veniam quos fuga voluptate fugiat. At, iusto repudiandae.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid sunt fuga dolores temporibus rem saepe magni repellendus, soluta laudantium! Soluta quibusdam enim, debitis cum voluptatem dicta asperiores quae. Voluptates, tenetur.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo, amet necessitatibus? Quaerat ipsam incidunt minus. Temporibus aliquam atque doloremque expedita. Quidem, voluptatibus iure explicabo aspernatur maxime optio sunt eveniet error?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa reprehenderit unde laborum ut sunt corrupti officia tempore laboriosam tenetur, suscipit ipsam id voluptate natus nesciunt ab nihil, nulla voluptatibus repellendus!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus illo quia libero reiciendis velit doloremque nobis magnam dolorem rerum suscipit officiis possimus, adipisci animi alias doloribus, quidem provident eveniet voluptates?

            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente sit asperiores laborum voluptates ipsam amet mollitia ad tenetur, voluptatem nulla, accusantium architecto ex obcaecati ullam nihil illo. Sed, accusantium veritatis?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum corrupti unde ad. Minima in debitis recusandae error. Ipsa a aut, pariatur similique totam cum blanditiis, nulla sint sed, soluta quisquam?
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima sapiente eaque amet mollitia incidunt labore blanditiis quasi corrupti quam exercitationem sequi id repudiandae ducimus vitae veritatis, sed consequuntur, ut architecto?',
            'status' => 'ACTIVE',
        ]);
    }
}
