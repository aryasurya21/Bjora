<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Arya',
                'email' => 'arya.cia@binus.edu',
                'password' => \Hash::make('12345678'),
                'gender' => 'male',
                'address' => 'Jalan Mawar Gang Rukun Nomor 115A Helvetia',
                'photo' => '5dd94d28d9577girl.jpg',
                'dateofbirth' => '1999-12-13',
                'isAdmin' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Surya',
                'email' => 'surya.cia@binus.edu',
                'password' => \Hash::make('12345678'),
                'gender' => 'female',
                'address' => 'Jalan Melati Gang Jaya Nomor 120A Helvetia',
                'photo' => '5dd94d6a66e3ajudah.jpg',
                'dateofbirth' => '1999-09-13',
                'isAdmin' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Steven',
                'email' => 'stevencibai@binus.edu',
                'password' => \Hash::make('12345678'),
                'gender' => 'female',
                'address' => 'Jalan Sambas Nomor Nomoran',
                'photo' => '5dd94db1bd9b8farmerboy.jpg',
                'dateofbirth' => '2000-09-13',
                'isAdmin' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Novi',
                'email' => 'novi@binus.edu',
                'password' => \Hash::make('12345678'),
                'gender' => 'male',
                'address' => 'Jalan Citra 5 Cengkarate',
                'photo' => '5ddbb90e5b1d6m-retrocam.jpg',
                'dateofbirth' => '1997-09-13',
                'isAdmin' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
