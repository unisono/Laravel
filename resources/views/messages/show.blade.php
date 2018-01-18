@extends('layouts')

@section('titulo','Mensaje')


@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
             <h2>{{$menssage->nombre}} <small><mark>Enviado por</mark></small>  </h2>
            <label>Email </label> : {{$menssage->email}}<br>
            <label>Texto  </label>: {{$menssage->texto}}<br>
        </div>
    </div>

@stop