<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Enums\UserRole;
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
        $this->call([
                        RoleSeed::class,
                    ]);

        User::factory([
                          'name'     => 'Admin',
                          'password' => 'password123',
                          'phone'    => '998123456789',
                      ])
            ->activated()
            ->withRole(RoleEnum::ADMIN->value)
            ->create();
    }
}
