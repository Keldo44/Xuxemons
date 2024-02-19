<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Pokemon;


class PokemonController extends Controller
{
    //cargar página principal
    public function index()
    {
        $pokemons = Pokemon::all();

        return response()->json($pokemons, 200);

        //funcionalidad web.php
        //return view('pokemons.index', compact('pokemons'));
    }

    public function show($id)
    {
        try {
            $pokemon = Pokemon::findOrFail($id);

            return response()->json($pokemon, 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Pokémon no encontrado'], 404);
        }

         //funcionalidad para web.php
        //return redirect()->route('pokemons.index', compact('pokemon'));
    }

    //página de creación
    public function create()
    {
        return view('pokemons.create');
    }

    //guarda información en BD
    public function store(Request $request)
    {               
        try {
            $request->validate([
                'idEntrenador' => 'required|string',
                'mote' => 'nullable|string',
                'nombre' => 'required|string',
                'tipo' => 'required|in:agua,fuego,planta,eléctrico,tierra',
                'tamanio' => 'required|in:grande,mediano,pequeño',
                'peso' => 'required|numeric',
            ]);

            Pokemon::create($request->all());

            return response()->json(['message' => 'Pokémon creado correctamente'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Pokémon no insertado'], 404);
        }

        //funcionalidad para web.php
        //return redirect()->route('pokemons.index')->with('success', 'Pokémon creado correctamente');
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', compact('pokemon'));
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'idEntrenador' => 'required|string',
                'mote' => 'nullable|string',
                'nombre' => 'required|string',
                'tipo' => 'required|in:agua,fuego,planta,eléctrico,tierra',
                'tamanio' => 'required|in:grande,mediano,pequeño',
                'peso' => 'required|numeric',
            ]);

            $pokemon = Pokemon::findOrFail($id); //buscar pokemon
            $pokemon->update($request->all()); //guardar datos

            return response()->json(['pokémon' => $pokemon, 'message' => 'Pokemon actualizado correctamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Pokémon no actualizado'], 404);
        }

        //funcionalidad para web.php
        //return redirect()->route('pokemons.index');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id); //buscar pokemon
        $pokemon->delete();

        return response()->json(['message' => 'Pokémon eliminado correctamente'], 200);

        //funcionalidad para web.php
        //return redirect()->route('pokemons.index');
    }
}


