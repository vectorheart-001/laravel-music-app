<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           PermissionsSeeder::class,
          RolesSeeder::class,
           PermissionsRoleSeeder::class,
          UsersSeeder::class,
          UserRoleSeeder::class,


       ]);
    }
}
