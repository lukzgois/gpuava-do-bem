@extends('layouts.main')

@section('content')
    <h1>Cadastro de Usuários</h1>


    <div class="card">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>teste</td>
                    <td>teste</td>
                    <td class="table__actions">
                        <a href="#">
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-trash fa-fw"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection