<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Matko Moni',
            'email' => 'matko@m.com',
            'password' => bcrypt('m1234')
        ]);

        $user->profile()->create([
            'username' => 'matkomoni',
            'address' => 'Vrbovec 100',
            'phone' => '0965643317'
        ]);
    }
}
