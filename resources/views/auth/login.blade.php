@extends('layouts')

@section('titulo','Login')

@section('content')

    <form action="/login" method="post" class="form-inline" role="form">
        {{csrf_field()}}
        <div class="form-group">
            <label class="sr-only" for="">Email</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Email">
        </div>

        <div class="form-group">
            <label class="sr-only" for="">Password</label>
            <input type="password" class="form-control" name="password" id="" placeholder="Password">
        </div>



        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>


    @stop