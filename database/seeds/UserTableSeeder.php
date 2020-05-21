<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'admin';
        $user1->email = 'admin@cg.com';
        $user1->password = Hash::make('admin123');
        $user1->save();
    }
}
