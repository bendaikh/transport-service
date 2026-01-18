<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the RoleAndUserSeeder to create roles and superadmin
        $this->call([
            RoleAndUserSeeder::class,
        ]);
    }
}
