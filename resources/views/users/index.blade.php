@extends('layouts')

@section('titulo','Usuarios')

@section('content')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                {{$user->roles->pluck('display_name')->implode(' - ')}}
            </td>

            <td>
                <a class="btn btn-primary btn-xs" href="{{route('usuarios.edit',$user->id)}}">
                    Editar
                </a>
                <form style="display: inline" method="POST" action="{{route('usuarios.destroy',$user->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                </form>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @stop