<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Ante Antić',
            'email' => 'ante@ante.com',
            'password' => bcrypt('p1234')
        ]);

        $user->books()->create([
            'author' => 'Ante Antić',
            'title' => 'Preobraženje',
            'year' => 2000
        ]);
    $this->call([
        UserSeeder::class   
    ]);

}
   
}
