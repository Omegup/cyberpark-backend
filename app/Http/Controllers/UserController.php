<?php

namespace App\Http\Controllers;

use App\Models\Bureaux;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureaux = Bureaux::latest()->paginate(5);
    
        return view('bureaux.index',compact('bureaux'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bureaux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gérant' => 'required',
            'email' => 'required',
            'service' => 'required',
        ]);
    
        Bureaux::create($request->all());
     
        return redirect()->route('bureaux.index')
                        ->with('success','Office added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bureaux  $bureaux
     * @return \Illuminate\Http\Response
     */
    public function show(Bureaux $bureaux)
    {
        return view('bureaux.show',compact('bureaux'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bureaux  $bureaux
     * @return \Illuminate\Http\Response
     */
    public function edit(Bureaux $bureaux)
    {
        return view('bureaux.edit',compact('bureaux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bureaux  $bureaux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bureaux $bureaux)
    {
        $request->validate([
            'gérant' => 'required',
            'email' => 'required',
            'service' => 'required',
        ]);
    
        $bureaux->update($request->all());
    
        return redirect()->route('bureaux.index')
                        ->with('success','Office updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bureaux  $bureaux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bureaux $bureaux)
    {
        $bureaux->delete();
    
        return redirect()->route('bureaux.index')
                        ->with('success','Office deleted successfully');
    }
}
