<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Steven Cardoso',
            'email' => 'stevensousa22@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->restaurants()->create([
            'name' => 'Highway Star',
            'location' => 'Bhuvandas Road, NH14 Dadar, Mumbai',
        ]);

        $user->restaurants()->create([
            'name' => 'Mukesh Lunch Home',
            'location' => 'Sai Balaji Tower, Airoli Navi Mumbai',
        ]);

        //User::truncate();
        //DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $garconRole = Role::where('name', 'garcon')->first();
        $cozinheiroRole = Role::where('name', 'cozinheiro')->first();

        $admin = User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
        ]);
            
        $garcon = User::create([
            'name'=>'Garcon User',
            'email'=>'garcon@garcon.com',
            'password'=>Hash::make('password')
        ]);

        $cozinheiro = User::create([
            'name'=>'Cozinheiro User',
            'email'=>'cozinheiro@cozinheiro.com',
            'password'=>Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $garcon->roles()->attach($garconRole);
        $cozinheiro->roles()->attach($cozinheiroRole);

    }
}
