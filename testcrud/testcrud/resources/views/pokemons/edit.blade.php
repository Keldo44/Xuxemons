<!-- resources/views/pokemons/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Pokémon</h1>

    <form action="{{ route('pokemons.update', $pokemon->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $pokemon->nombre }}" required>

        <label for="tipo">Tipo:</label>
        <select name="tipo" required>
            <option value="agua" {{ $pokemon->tipo === 'agua' ? 'selected' : '' }}>Agua</option>
            <option value="fuego" {{ $pokemon->tipo === 'fuego' ? 'selected' : '' }}>Fuego</option>
            <option value="planta" {{ $pokemon->tipo === 'planta' ? 'selected' : '' }}>Planta</option>
            <option value="planta" {{ $pokemon->tipo === 'eléctrico' ? 'selected' : '' }}>Planta</option>
            <option value="planta" {{ $pokemon->tipo === 'tierra' ? 'selected' : '' }}>Planta</option>
            <!-- Agrega más tipos según sea necesario -->
        </select>

        <label for="tamaño">Tamaño:</label>
        <select name="tamanio" required>
            <option value="grande" {{ $pokemon->tamaño === 'grande' ? 'selected' : '' }}>Grande</option>
            <option value="mediano" {{ $pokemon->tamaño === 'mediano' ? 'selected' : '' }}>Mediano</option>
            <option value="pequeño" {{ $pokemon->tamaño === 'pequeño' ? 'selected' : '' }}>Pequeño</option>
        </select>

        <label for="peso">Peso:</label>
        <input type="text" name="peso" step="0.01" value="{{ $pokemon->peso }}" required>

        <label for="mote">Mote:</label>
        <input type="text" name="mote" step="0.01" value="{{ $pokemon->mote }}" required>

        <button type="submit">Actualizar Pokémon</button>
    </form>
@endsection
