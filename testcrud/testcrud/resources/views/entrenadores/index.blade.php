<!-- resources/views/pokemons/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Listado entrenadores</h1>

    <table>
        <thead>
            <tr>
                <th>idEntrenador</th>
                <th>Nombre</th>
                <th>Fecha nacimiento</th>
                <th>Ciudad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entrenadores as $entrenador)
                <tr>
                    <td>{{ $entrenador->idEntrenador }}</td>
                    <td>{{ $entrenador->nombre }}</td>
                    <td>{{ $entrenador->fechaN }}</td>
                    <td>{{ $entrenador->ciudad }}</td>
                    <td><a href="">Editar</a></td>
                    <td>
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('entrenadores.create') }}">Añadir</a>
@endsection
