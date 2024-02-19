<!-- resources/views/pokemons/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Pokémon</h1>

    <form>
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" step="0.01" value="{{ $entrenador->nombre }}" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" step="0.01" value="{{ $entrenador->ciudad }}" required>

        <label for="fechaN">Fecha nacimiento:</label>
        <input type="date" name="fechaN" step="0.01" value="{{ $entrenador->fechaN }}" required>

        <button type="submit">Actualizar información</button>
    </form>
@endsection
