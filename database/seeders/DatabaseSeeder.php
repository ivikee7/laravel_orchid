<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use App\Models\StudentSection;
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

        StudentClass::create(['name' => 'Nursery', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'LKG', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'UKG', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-1', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-2', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-3', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-4', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-5', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-6', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-7', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-8', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-9', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-10', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-11', 'creator_id' => 1, 'updater_id' => 1]);
        StudentClass::create(['name' => 'STD-12', 'creator_id' => 1, 'updater_id' => 1]);

        StudentSection::create(['name' => 'Harmony', 'creator_id' => 1, 'updater_id' => 1]);
        StudentSection::create(['name' => 'Empathy', 'creator_id' => 1, 'updater_id' => 1]);
        StudentSection::create(['name' => 'Integrity', 'creator_id' => 1, 'updater_id' => 1]);
        StudentSection::create(['name' => 'Courage', 'creator_id' => 1, 'updater_id' => 1]);
    }
}
