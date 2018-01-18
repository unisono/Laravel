@extends('layouts')

@section('titulo','Enviar un mensaje')

@section('content')



    <form action="{{route('mensajes.store')}}" method="POST" class="form-horizontal" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="" placeholder="">
            </div>
        </div>



        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="" placeholder="">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Comentarios</label>
            <div class="col-sm-10">

                <textarea class="form-control" name="texto" id="" cols="30" rows="10"></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary right">Enviar</button>
            </div>
        </div>
    </form>




@stop
