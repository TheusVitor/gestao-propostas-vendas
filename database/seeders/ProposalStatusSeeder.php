<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProposalStatus;

class ProposalStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['Aberto', 'Em Análise', 'Finalizado', 'Cancelado'];
        foreach ($statuses as $name) {
            ProposalStatus::create(['name' => $name]);
        }
    }
}
