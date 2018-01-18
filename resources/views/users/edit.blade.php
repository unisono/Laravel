@extends('layouts')

@section('titulo','Editar Usuarios')
@section('content')
    <h3>Contenido de contacto</h3>


    <form class="form-horizontal" role="form" action="{{route('usuarios.update', $user->id)}}" method="POST" >
        {{method_field('PUT')}}
        {{ csrf_field() }}


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{$user->name}}">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </div>



    </form>


@stop
