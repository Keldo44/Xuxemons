<?php

namespace App\Http\Controllers;

use App\Models\Xuxemon;
use Illuminate\Http\Request;

/**
 * Class XuxemonController
 * @package App\Http\Controllers
 */
class XuxemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xuxemons = Xuxemon::paginate();

        return view('xuxemon.index', compact('xuxemons'))
            ->with('i', (request()->input('page', 1) - 1) * $xuxemons->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xuxemon = new Xuxemon();
        return view('xuxemon.create', compact('xuxemon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Xuxemon::$rules);

        $xuxemon = Xuxemon::create($request->all());

        return redirect()->route('xuxemons.index')
            ->with('success', 'Xuxemon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $xuxemon = Xuxemon::find($id);

        return view('xuxemon.show', compact('xuxemon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xuxemon = Xuxemon::find($id);

        return view('xuxemon.edit', compact('xuxemon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Xuxemon $xuxemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Xuxemon $xuxemon)
    {
        request()->validate(Xuxemon::$rules);

        $xuxemon->update($request->all());

        return redirect()->route('xuxemons.index')
            ->with('success', 'Xuxemon updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $xuxemon = Xuxemon::find($id)->delete();

        return redirect()->route('xuxemons.index')
            ->with('success', 'Xuxemon deleted successfully');
    }
}
