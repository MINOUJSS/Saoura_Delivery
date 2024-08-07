<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Admin_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' =>'Amine',
            'email'=>'minoujss@gmail.com',            
            'password'=>hash::make('MINOU1984'),
            'type' =>1
        ]);

        DB::table('admins')->insert([
            'name' =>'Abdelbari',
            'email'=>'abdel_bari_91@yahoo.com',            
            'password'=>hash::make('admin'),
            'type' =>1
        ]);

    }
}
