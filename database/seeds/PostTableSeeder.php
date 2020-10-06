<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postCount = (int)$this->command->ask('Quantos posts deseja criar aleatoriamente para teste? PS.:só aceita números', 25);
        factory(App\Post::class, $postCount)->create();
    }
}
