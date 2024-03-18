<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Inventory;

class ItemsController extends Controller
{
    public function index( Request $request)
    {
        $user = User::where('session_token', $request->token)->first();

        try {
            if (!$user) {
                return response()->json('Usuario no encontrado', 404);
            }

            if ($user->role !== 'administrador') {
                return response()->json('No tienes permiso para hacer eso', 403);
            }
        } catch (\Exception $e) {
            return response()->json('Error al buscar el usuario', 500);
        }
       
        $items = Item::all();
        return response()->json($items, 200);
        
    }

    public function update(Request $request){
        $user = User::where('session_token', $request->token)->first();

        try {
            if (!$user) {
                return response()->json('Usuario no encontrado', 404);
            }

            if ($user->role !== 'administrador') {
                return response()->json('No tienes permiso para hacer eso', 403);
            }
        } catch (\Exception $e) {
            return response()->json('Error al buscar el usuario', 500);
        }
       
        $item = Item::find($request->item_id);

        if (!$item) {
            return response()->json('Artículo no encontrado', 404);
        }

        // Update the item attributes here
        $item->prize = $request->item_prize;
        $item->name = $request->item_name;
        // Add other attributes as needed

        // Save the updated item
        $item->save();

        return response()->json($item, 200);
    }

    public function getInventory( Request $request){
        $user = User::where('session_token', $request->token)->first();

        try {
            if (!$user) {
                return response()->json('Usuario no encontrado', 404);
            }

            if ($user->role !== 'administrador') {
                return response()->json('No tienes permiso para hacer eso', 403);
            }
        } catch (\Exception $e) {
            return response()->json('Error al buscar el usuario', 500);
        }
       
        $inventory = Inventory::with('item')->where('id_user', $user->id)->get();
        return response()->json($inventory, 200);
    }
    public function giveItem(Request $request){
        Inventory::create([
            'id_user' => $request->user_id,
            'id_item' => $request->item_id,
            'amount' => $request->amount,
        ]);
    }
}
