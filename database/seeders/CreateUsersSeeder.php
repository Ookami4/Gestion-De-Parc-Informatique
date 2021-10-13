<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Channani Soufiane',
                'email'=>'soufiane@gmail.com',
                'is_admin'=>'0',
                'rib'=>'3215313541354354354135435',
                'password'=> bcrypt('12345678'),
                'adress'=>'Quartie Tamarisse Avenue Ibn Khaldoun Casablanca',
            ],
            [
                'name'=>'Moulay Taj',
                'email'=>'zakaria@gmail.com',
                'is_admin'=>'0',
                'rib'=>'3438438643684135435',
                'password'=> bcrypt('12345678'),
                'adress'=>'Quartie Massira Avenue Azhari Taourirt',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
