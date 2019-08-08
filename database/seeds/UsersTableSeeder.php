<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => "Moustafa Ahmed",
            'email' => "mous.ahmed@outlook.com",
            'email_verified_at' => now(),
            'role' => 'administrator',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->posts()->save(factory(App\Post::class)->create());

        factory(User::class, 5)->create()->each(function ($user) {
            for ($i = 0; $i < 10; $i++) {
                $user->posts()->save(factory(App\Post::class)->create());
            }
        });

    }
}
