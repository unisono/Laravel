@extends('layouts')


@section('titulo')
    <h1>Saludos {{$saludos}}</h1>
@stop


@section('content')



@forelse($data as $item)
    {{$item}}
    @empty
    <p>No hay nada. :-(</p>
    @endforelse
@stop