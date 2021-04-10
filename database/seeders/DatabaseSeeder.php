<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use App\Models\Tweet;
use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ChatRoom::factory(1)->create();
        // Message::factory(2)->create();
        // $userA = User::factory()->create([
        //     'name' => 'Bret Oreta',
        //     'username' => '_yk.travis',
        //     'email' => 'bremmurd08@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);
        // $userB = User::factory()->create([
        //     'name' => 'Malula Hurtan',
        //     'username' => 'malula.hurtan',
        //     'email' => 'malulahurtan@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);

        // Tweet::factory(20)->create(['user_id' => $userA->id]);
        // Tweet::factory(20)->create(['user_id' => $userB->id]);

        // $userA->followings()->attach(User::factory(20)->create()->pluck('id'));
        // $userA->followers()->attach(User::factory(20)->create()->pluck('id'));

        // $userB->followings()->attach(User::factory(20)->create()->pluck('id'));
        // $userB->followers()->attach(User::factory(20)->create()->pluck('id'));
    }
}
