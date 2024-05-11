<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =  User::factory(10000)->make();
        $users->chunk(500)->each(function($chunk) {
            User::insert($chunk->toArray());
        });
       DB::statement("update users set created_at = now() , updated_at = now() ");
    }
}
