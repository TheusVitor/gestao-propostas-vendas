@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Propostas de Venda</h1>
    <a href="{{ route('proposals.create') }}" class="btn btn-primary mb-3">Nova Proposta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Vendido</th>
                <th>Valor (R$)</th>
                <th>Status</th>
                <th>Data Cadastro</th>
                <th>Data Finalização</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposals as $p)
            <tr>
                <td><a href="{{ route('proposals.show', $p) }}">{{ $p->id }}</a></td>
                <td>{{ $p->item }}</td>
                <td>{{ number_format($p->value, 2, ',', '.') }}</td>
                <td>{{ $p->status->name }}</td>
                <td>{{ $p->registered_at->format('d/m/Y H:i') }}</td>
                <td>{{ optional($p->finalized_at)->format('d/m/Y H:i') ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
