@extends('layouts.login')

@section('content')

  <div class="col-md-6 col-md-offset-3">
    <h1>Login</h1>

    <hr>

    <form action="/login" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email">E-mail</label>
          <input
            type="email"
            class="form-control"
            id="email"
            placeholder="E-mail"
            name="email"
            autofocus>
          <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group">
          <label for="password">Senha</label>
          <input
            type="password"
            class="form-control"
            id="password"
            placeholder="Senha"
            name="password">
          <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>

        <button
          type="submit"
          class="btn btn-default btn-primary"
        >Login
        </button>
    </form>
  </div>

@endsection