<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalStatusesRequest;
use App\Models\Proposal;
use App\Models\ProposalLog;
use App\Models\ProposalStatus;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::with('status')->orderBy('registered_at', 'desc')->get();
        return view('proposals.index', compact('proposals'));
    }

    public function create()
    {
        return view('proposals.create');
    }

    public function store(StoreProposalRequest $request)
    {
        $proposal = Proposal::create([
            'item'          => $request->item,
            'value'         => $request->value,
            'status_id'     => ProposalStatus::where('name', 'Aberto')->first()->id,
            'user_id'       => Auth::id(),
        ]);

        ProposalLog::create([
            'proposal_id' => $proposal->id,
            'user_id'     => Auth::id(),
            'status_id'   => '1',
            'action'      => 'Criação',
            'notes'       => 'Proposta criada',
        ]);

        return redirect()->route('proposals.index')
                         ->with('success', 'Proposta criada com sucesso.');
    }

    public function show(Proposal $proposal)
    {
        $proposal->load('status', 'logs.user');
        return view('proposals.show', compact('proposal'));
    }

    public function edit(Proposal $proposal)
    {
        if ($proposal->status->name === 'Finalizado') {
            return redirect()->back()->withErrors('Proposta já finalizada; não pode ser alterada.');
        }
        $statuses = ProposalStatus::all();
        return view('proposals.edit', compact('proposal', 'statuses'));
    }

    public function update(UpdateProposalStatusesRequest $request, Proposal $proposal)
    {
        if ($proposal->status->name === 'Finalizado') {
            return redirect()->back()->withErrors('Não é possível alterar proposta finalizada.');
        }

        $proposal->status_id = $request->status_id;
        if (ProposalStatus::find($request->status_id)->name === 'Finalizado') {
            $proposal->finalized_at = now();
        }
        $proposal->save();

        ProposalLog::create([
            'proposal_id' => $proposal->id,
            'user_id'     => Auth::id(),
            'status_id'   => $request->status_id,
            'action'      => 'Mudança de Status',
            'notes'       => $request->notes,
        ]);

        return redirect()->route('proposals.show', $proposal)
                         ->with('success', 'Status da proposta atualizado.');
    }
}
