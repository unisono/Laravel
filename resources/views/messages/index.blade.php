@extends('layouts')
@section('titulo','Todos los mensajes')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nombre</th>


            <th>
                Email
            </th>


            <th>
                Mensaje
            </th>

            <th>
                Acciones
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $item)
            <tr>
                <td>
                    <a href="{{route('mensajes.show',$item->id)}}">
                        {{$item->nombre}}
                    </a>
                </td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    {{$item->texto}}
                </td>

                <td>
                    <a class="btn btn-primary btn-xs" href="{{route('mensajes.edit',$item->id)}}">
                        Editar
                    </a>
                    <form style="display: inline" method="POST" action="{{route('mensajes.destroy',$item->id)}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    {!! $messages->links(); !!}




@stop