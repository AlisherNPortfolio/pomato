<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Pomato',
                'username' => 'pomato',
                'email' => 'super@mail.uz',
                'password' => Hash::make('Superadmin12@'),
            ],
        ];

        $permissions = [
            ['admin'],
        ];

        foreach ($users as $key => $user) {
            $userModel = User::query()->create($user);
            $userModel->assignRole($permissions[$key]);
        }
    }
}
