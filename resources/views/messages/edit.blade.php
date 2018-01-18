@extends('layouts')

@section('titulo','Editar mensaje')
@section('content')
    <h3>Contenido de contacto</h3>

    <form action="{{route('mensajes.update', $message->id)}}" method="POST" >
        {{method_field('PUT')}}
        {{ csrf_field() }}
        <p> <label for="">Nombre
                <input type="text" name="nombre" value="{{$message->nombre}}">

            </label></p>
        <p><label for="">Email
                <input type="email" name="email" value="{{$message->email}}">
            </label></p>

        <p><label for="">
            <textarea name="mensaje" id="" cols="30" rows="10">
{{$message->texto}}
            </textarea>
            </label></p>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>

            </div>
        </div>

    </form>


@stop
