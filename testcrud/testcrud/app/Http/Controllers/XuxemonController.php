<?php

namespace App\Http\Controllers;

use App\Models\Xuxemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function index()
    {
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

        return response()->json([
            'success' => true,
            'data' => $xuxemon,
        ]);
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
    public function edit($id)
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
            'data' => ['xuxemon' => $xuxemon],
        ]);
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
    public function destroy($id)
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
