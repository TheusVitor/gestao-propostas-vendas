@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alterar Status da Proposta #{{ $proposal->id }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('proposals.update', $proposal) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status_id" class="form-label">Novo Status</label>
            <select name="status_id" id="status_id" class="form-control" required>
                @foreach($statuses as $s)
                    <option value="{{ $s->id }}" {{ old('status_id', $proposal->status_id) == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Observação</label>
            <textarea name="notes" id="notes" rows="3" class="form-control" required>{{ old('notes') }}</textarea>
        </div>
        <button class="btn btn-success">Salvar Alteração</button>
    </form>
</div>
@endsection
