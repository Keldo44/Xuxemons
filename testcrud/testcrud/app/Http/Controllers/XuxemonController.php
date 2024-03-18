<?php

namespace App\Http\Controllers;

use App\Models\Xuxemon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\pc;

/**
 * Class XuxemonController
 * @package App\Http\Controllers
 */
class XuxemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index( Request $request)
    {
        $user = User::where('session_token', $request->token)->first();
        if ($user->role != 'administrador') { 
            return response()->json('No tienes permiso para hacer eso');
        }
        $xuxemons = Xuxemon::all();
        return response()->json($xuxemons, 200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'data' => ['xuxemon' => new Xuxemon()],
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Xuxemon::$rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
            ], 422);
        }

        $xuxemon = Xuxemon::create($request->all());
        //$this->catchXuxemon($request, $xuxemon->id);
        return response()->json([
            'success' => true,
            'data' => $xuxemon,
        ]);
    }
    public function catchXuxemon(Request $request, $xuxemonId)
    {
        $user = User::where('session_token', $request->token)->first();

        // Attach the Xuxemon to the user's Pokedex
        $user->pokedex()->attach($xuxemonId);

        pc::create([
            'user_id' => 1,
            'xuxemon_id' => $xuxemonId,
            'hp_remaining' => 100,
            'candies' => 10,
            'size' => 2,
        ]);
        
        return response()->json(['message' => 'Xuxemon caught successfully']);
    }
    public function catchRand(Request $request)
    {
        $user = User::where('session_token', $request->token)->first();

        $randomXuxemon = Xuxemon::inRandomOrder()->first()->id;
    
        if ($randomXuxemon) {
            // Attach the randomly selected Xuxemon to the user's Pokedex
            $user->pokedex()->attach($randomXuxemon);

            pc::create([
                'user_id' => 1,
                'xuxemon_id' => $randomXuxemon,
                'hp_remaining' => 50,
                'candies' => rand(0,10),
                'size' => 2,
            ]);
    
            return response()->json(['message' => 'Xuxemon caught successfully']);
        } else {
            return response()->json(['message' => 'No Xuxemons available']);
        }
    }

    public function getXuxedex(Request $request){
        $user = User::where('session_token', $request->token)->first();
        $xuxemons = Xuxemon::all();
        $catched = $user->pokedex;
    
        $xuxedex = [];
    
        foreach ($xuxemons as $index => $xuxemon) {
            $isCaught = $catched->contains($xuxemon);
    
            $xuxedex[] = [
                'id' => str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'name' => $isCaught ? $xuxemon->name : '---',
                'type' => $isCaught ? $xuxemon->type : '?',
            ];
        }
    
        return $xuxedex;
    
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $xuxemon = Xuxemon::find($id);

        if (!$xuxemon) {
            return response()->json([
                'success' => false,
                'error' => 'Xuxemon not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $xuxemon,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, $id)
    {
        // $xuxemon = Xuxemon::find($id);

        // if (!$xuxemon) {
        //     return response()->json([
        //         'success' => false,
        //         'error' => 'Xuxemon not found',
        //     ], 404);
        // }

        // return response()->json([
        //     'success' => true,
        //     'data' => ['xuxemon' => $xuxemon],
        // ]);

        try {
            $user = User::where('session_token', $request->token)->first();
            if ($user->role != 'administrador') { 
                return response()->json('No tienes permiso para hacer eso');
            }

            $request->validate([
                'name' => 'required|string',
                'hp' => 'required|integer',
                'type' => 'required|string',
            ]);

            $xuxemon =  Xuxemon::findOrFail($id); //buscar pokemon
            $xuxemon->update([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'hp' => $request->input('hp'),
                
                // Add other fields as needed
            ]);

            return response()->json(['xuxemon' => $xuxemon, 'message' => 'Xuxemon actualizado correctamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Xuxemon no actualizado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Xuxemon $xuxemon
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Xuxemon $xuxemon)
    {
        $validator = Validator::make($request->all(), Xuxemon::$rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
            ], 422);
        }

        $xuxemon->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $xuxemon,
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        
        $xuxemon = Xuxemon::find($id);

        if (!$xuxemon) {
            return response()->json([
                'success' => false,
                'error' => 'Xuxemon not found',
            ], 404);
        }

        $xuxemon->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xuxemon deleted successfully',
        ]);
    }
}
