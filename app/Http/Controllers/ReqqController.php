<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ReqqController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return Application::all();
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       return Application::findOrFail($id);
   }

   public function store(Request $request)
   {
       $application = Application::create($request->all());
       return response()->json($application, 201);
   }

   public function update(Request $request, $id)
   {
       $application = Application::findOrFail($id);
       $application->update($request->all());

       return response()->json($application, 200);
   }

   public function destroy($id)
   {
    Application::destroy($id);

       return response()->json(null, 204);
   }
}
