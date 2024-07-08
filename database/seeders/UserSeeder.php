<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $roleAdmin = Role::query()->where('title' , 'super-admin')->first();
        User::query()->create([
            'name' => 'kourosh' ,
            'email' => 'kourosh13861386@gmail.com' ,
            'password' => bcrypt('123456') ,
            'role_id' => $roleAdmin->id ,
        ]);
    }
}
