<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin', 'email' =>'admin@gmail.com', 'email_verified_at'=> now(),'password'=>bcrypt('admin'),'created_at'=>now(),'updated_at'=>now(),'role_id'=>1, 'lastname'=>'admin'
        ]);
    }
}
