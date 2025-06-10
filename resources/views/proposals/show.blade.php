@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Proposta #{{ $proposal->id }}</h1>
    <p><strong>Item:</strong> {{ $proposal->item }}</p>
    <p><strong>Valor:</strong> R$ {{ number_format($proposal->value, 2, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ $proposal->status->name }}</p>
    <p><strong>Data Cadastro:</strong> {{ $proposal->registered_at->format('d/m/Y H:i') }}</p>
    <p><strong>Data Finalização:</strong> {{ optional($proposal->finalized_at)->format('d/m/Y H:i') ?? '-' }}</p>

    @if($proposal->status->name !== 'Finalizado')
      <a href="{{ route('proposals.edit', $proposal) }}" class="btn btn-primary">Alterar Status</a>
    @endif

    <hr>

    <h3>Logs de Alteração</h3>
    <ul class="list-group">
      @foreach($proposal->logs as $log)
        <li class="list-group-item">
          {{ $log->logged_at->format('d/m/Y H:i') }} —
          {{ $log->user->name }} alterou para
          "<strong>{{ $log->status->name }}</strong>": {{ $log->notes }}
        </li>
      @endforeach
    </ul>
</div>
@endsection
