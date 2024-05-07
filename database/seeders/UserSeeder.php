<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $admin=User::factory()->create([
            'name' => 'Ali',
            'email' => 'Ali@gmail.com',
            'password' => Hash::make('secret')

        ]);
        $admin->assignRole('Admin');
        $token = $admin->createToken('admin-api-token')->plainTextToken;
        



        $Visitor=User::factory()->create([
            'name' => 'Mohammed',
            'email' => 'Mohammed@gmail.com',
            'password' => Hash::make('secret')
        ]);

        $Memeber=User::factory()->create([
            'name' => 'jaffer',
            'email' => 'jaffar@gmail.com',
            'password' => Hash::make('secret')
        ]);
        $Memeber->assignRole('Member');
    }
}
