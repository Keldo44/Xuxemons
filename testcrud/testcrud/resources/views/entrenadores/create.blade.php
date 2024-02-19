<!-- resources/views/entrenadores/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Alta entrenador</h1>


    <form>
        @csrf

        <label for="idEntrenador">id.Entrenador:</label>
        <input type="text" name="idEntrenador" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="fechaN">Fecha nacimiento:</label>
        <input type="date" name="fechaN" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
