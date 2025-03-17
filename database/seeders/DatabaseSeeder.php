<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Orchid\Platform\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['slug' => 'super-admin', 'name' => 'Super Admin']);
        Role::create(['slug' => 'admin', 'name' => 'Admin']);
        Role::create(['slug' => 'teacher', 'name' => 'Teacher']);
        Role::create(['slug' => 'student', 'name' => 'Student']);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'ivikee7@gmail.com',
            'password' => Hash::make('admin@123...!@'),
            'permissions' => array(
                "platform.systems.attachment" => "1",
                "platform.systems.roles" => "1",
                "platform.systems.users" => "1",
                "platform.index" => "1",
            ),
        ]);
    }
}
