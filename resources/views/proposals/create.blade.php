@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Proposta</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('proposals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="item" class="form-label">Item Vendido</label>
            <input type="text" name="item" id="item" class="form-control" value="{{ old('item') }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Valor (R$)</label>
            <input type="number" step="0.01" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
        </div>
        <button class="btn btn-success">Cadastrar</button>
    </form>
</div>
@endsection
