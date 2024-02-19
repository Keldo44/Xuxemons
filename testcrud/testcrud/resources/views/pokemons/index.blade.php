<!-- resources/views/pokemons/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Pokedex</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Tamaño</th>
                <th>Peso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->nombre }}</td>
                    <td>{{ $pokemon->tipo }}</td>
                    <td>{{ $pokemon->tamaño }}</td>
                    <td>{{ $pokemon->peso }}</td>
                    <td>
                        <a href="{{ route('pokemons.edit', $pokemon->id) }}">Editar</a>
                        <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pokemons.create') }}">Añadir</a>
@endsection
