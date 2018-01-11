<?php

use App\Models\Book;
use App\Models\User;
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
        User::create(['email'=>'admin@admin.com', 'password' => bcrypt('secret'), 'role'=>'Admin']);
        factory(User::class, 50)->create();
        factory(Book::class, 50)->create();                                                           
    }
}

