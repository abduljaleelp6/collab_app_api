<?php

namespace Database\Seeders;
use App\Models\Admins;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admins::create([
            'name' => 'Collab',
            'email' => 'collab@gmail.com',
            'password' => bcrypt('Collab@123')
        ]);
    }
}
