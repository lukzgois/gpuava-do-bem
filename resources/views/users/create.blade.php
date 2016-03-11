@extends('layouts.main')

@section('content')
    
    <h1>Cadastrar Usuário</h1>
    
    <div class="card">
        <div class="col-md-6">
            <form method="POST" action="/admin/users">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="control-label">Nome</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Nome"
                        autofocus />
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">E-mail</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        placeholder="E-Mail" />
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Senha</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Senha" />
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                
                <button type="submit" class="btn btn-success">
                    Cadastrar
                </button>
            </form>
        </div>
    </div>

@endsection