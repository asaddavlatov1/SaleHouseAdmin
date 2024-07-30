<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'title' => [
                    'uz_Latn' => 'Admin',
                    'uz_Cyrl' => 'Админ',
                    'ru'      => 'Админ',
                ],
                'name'  => RoleEnum::ADMIN,
            ],
            [
                'title' => [
                    'uz_Latn' => 'Restoran egasi',
                    'uz_Cyrl' => 'Ресторан эгаси',
                    'ru'      => 'Владелец ресторана',
                ],
                'name'  => RoleEnum::OWNER,
            ],
            [
                'title' => [
                    'uz_Latn' => 'Menejer',
                    'uz_Cyrl' => 'Менеджер',
                    'ru'      => 'Менеджер',
                ],
                'name'  => RoleEnum::MANAGER,
            ],

        ];

        foreach ($roles as $role) {
            \App\Models\Role::query()->create([
                                                  'title' => $role['title'],
                                                  'name'  => $role['name'],
                                              ]);
        }
    }
}
