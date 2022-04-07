<?php

namespace App\Http\Controllers\API;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mons = Pokemon::all();

        return response()->json($mons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|max:255|alpha',
            'spriteUrl' => 'required|url',
        ]);

        //new Pokemon
        $newMon = new Pokemon([
            'name' => $request->get('name'),
            'spriteUrl' => $request->get('spriteUrl'),
        ]);

        $newMon->save();

        return response()->json($newMon);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mon = Pokemon::findOrFail($id);
        return response()->json($mon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        $mon = Pokemon::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255|alpha',
            'spriteUrl' => 'required|url'
        ]);

        $mon->name = $request->get('name');
        $mon->spriteUrl = $request->get('spriteUrl');

        $mon->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mon = Pokemon::findOrFail($id);

        $mon->delete();

        return  response()->json(Pokemon::all());
    }
}
