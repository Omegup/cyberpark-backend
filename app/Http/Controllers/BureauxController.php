<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bureaux;

class BureauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bureaux::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bureaux::findOrFail($id);
    }

    public function store(Request $request)
    {
        $bureau = Bureaux::create($request->all());
        return response()->json($bureau, 201);
    }

    public function update(Request $request, $id)
    {
        $bureau = Bureaux::findOrFail($id);
        $bureau->update($request->all());

        return response()->json($bureau, 200);
    }

    public function destroy($id)
    {
        Bureaux::destroy($id);

        return response()->json(null, 204);
    }

}
