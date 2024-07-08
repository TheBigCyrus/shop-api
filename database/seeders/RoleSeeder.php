<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $superAdmin =  Role::query()->create([
           'title' => 'super-admin'
        ]);
       $superAdmin->permissions()->attach(permission::all());


       Role::query()->insert([
           'title' => 'normal-user'
        ]);

    }
}
