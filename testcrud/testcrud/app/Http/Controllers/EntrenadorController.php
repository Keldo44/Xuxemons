<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Entrenador;

class EntrenadorController extends Controller
{
    /* PÁGINA INICIAL */
    public function index()
    {
        $entrenadores = Entrenador::all();
        return response()->json(['Entrenador' => $entrenadores, 200]);
        //return view('entrenadores.index', compact('entrenadores'));
    }

    public function show(Request $request, $id){
        $entrenador = Entrenador::findOrFail($id); //buscar entrenador
        return response()->json(['Entrenador' => $entrenador, 200]);

    }
    /* CREACIÓN */
    public function create()
    {
        return view('entrenadores.create');
    }

    /* GUARDAR */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'fechaN' => 'required|string',
                'ciudad' => 'required|string',
                'idEntrenador' => 'required|string',
                'nick' => 'nullable:string',
            ]);
            Entrenador::create($request->all());

            return response()->json(['message' => 'Entrenador creado correctamente'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Entrenador no insertado'], 404);
        }
    }

    /* EDITAR */
    public function edit(Entrenador $entrenador)
    {
        return view('entrenadores.edit', compact('entrenador'));
    }

    /* ACTUALIZAR */
    public function update(Request $request,     $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'fechaN' => 'required|string',
                'ciudad' => 'required|string',
                'idEntrenador' => 'required|string',
                'nick' => 'nullable:string',
            ]);

            $entrenador = Entrenador::findOrFail($id); //buscar entrenador
            $entrenador->update($request->all()); //guardar datos

            return response()->json(['Entrenador' => $entrenador, 'message' => 'entrenador actualizado correctamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'entrenador no actualizado'], 404);
        }


    }

    /*ELIMINAR*/
    public function destroy(Entrenador $entrenador, $id)
    {
        $entrenador = Entrenador::findOrFail($id); //buscar entrenador
        $entrenador->delete();

        return response()->json(['message' => 'Entrenador eliminado correctamente'], 200);

    }

}
