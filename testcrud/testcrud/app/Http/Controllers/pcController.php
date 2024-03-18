<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pc;
use App\Models\Xuxemon;
use App\Models\User;

class pcController extends Controller
{
    public function getMyPC(Request $request){
        // Get the user and xuxemons data
        $xuxemonsInPC = pc::where('session_token', $request->token)
            ->join('xuxemons', 'pcs.xuxemon_id', '=', 'xuxemons.id')
            ->join('users', 'pcs.user_id', '=', 'users.id')
            ->select(
                'xuxemons.name as xuxemon_name',
                'users.name as user_name',
                'pcs.candies',
                'pcs.hp_remaining',
                'xuxemons.hp',
            )
            ->get();

        return response()->json($xuxemonsInPC);
    }
}
