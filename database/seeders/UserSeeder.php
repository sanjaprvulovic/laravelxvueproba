<?php

namespace Database\Seeders;

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
        $u= new User();
        $u->name='Admin';
        $u->email='admin@gmail.com';
        $u->password='123';
        $u->save();
    }
}
