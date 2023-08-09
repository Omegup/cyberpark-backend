<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class BureauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Office::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Office::findOrFail($id);
    }

    public function store(Request $request)
    {
        $office = Office::create($request->all());
        return response()->json($office, 201);
    }

    public function update(Request $request, $id)
    {
        $office = Office::findOrFail($id);
        $office->update($request->all());

        return response()->json($office, 200);
    }

    public function destroy($id)
    {
        Office::destroy($id);

        return response()->json(null, 204);
    }

}
