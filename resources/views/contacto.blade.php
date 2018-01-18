@extends('layouts')

@section('titulo')
    <h1>Contacto</h1>
    @stop
@section('content')
    <h3>Contenido de contacto</h3>

    <form action="contacto" method="POST" >
        {{csrf_field()}}
        <hidden></hidden>
       <p> <label for="">Nombre
            <input type="text" name="nombre" value="">

           </label></p>
        <p><label for="">Email
            <input type="email" name="email">
            </label></p>

        <p><label for="">
            <textarea name="mensaje" id="" cols="30" rows="10">

            </textarea>
            </label></p>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
        </div>

    </form>


@stop
