@extends('layouts.app')

@section('content')
<div class="container" style="max-width:400px;margin-top:2rem;">
    <h2 class="mb-4">Faça seu login</h2>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email"
                   id="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   required
                   autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password"
                   id="password"
                   name="password"
                   class="form-control"
                   required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>
@endsection
