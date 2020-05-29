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
        $user1->role = 1;
        $user1->save();
//adsdsagsahfsfsa
        $user2 = new User();
        $user2->name = 'admin2';
        $user2->email = 'admin2@cg.com';
        $user2->password = Hash::make('admin123');
        $user2->role = 2;
        $user2->save();

        $user3 = new User();
        $user3->name = 'admin3';
        $user3->email = 'admin3@cg.com';
        $user3->password = Hash::make('admin123');
        $user3->role = 3;
        $user3->save();

        $user4 = new User();
        $user4->name = 'admin4';
        $user4->email = 'admin4@cg.com';
        $user4->password = Hash::make('admin123');
        $user4->role = 4;
        $user4->save();
    }
}
