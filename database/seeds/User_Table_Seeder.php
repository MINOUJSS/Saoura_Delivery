<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class User_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Amine',
            'email'=>'minoujss@gmail.com',            
            'password'=>hash::make('MINOU1984'),
            'active'=>1,
            'type' =>1,
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' =>'Abdebari',
            'email'=>'admin@admin.com',            
            'password'=>hash::make('admin'),
            'active'=>1,
            'type' =>1,
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
