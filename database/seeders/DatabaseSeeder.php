<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Database\Seeders\ProposalStatusSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'Alice ADM',
            'email'    => 'alice@example.com',
            'password' => Hash::make('teste123'),
        ]);
        User::create([
            'name'     => 'Bob TI',
            'email'    => 'bob@example.com',
            'password' => Hash::make('teste123'),
        ]);
        User::create([
            'name'     => 'Carol RH',
            'email'    => 'carol@example.com',
            'password' => Hash::make('teste123'),
        ]);

        $this->call(ProposalStatusSeeder::class);
    }
}
