<?php

namespace App\Http\Controllers;

use App\Models\Treparation;
use Illuminate\Http\Request;

class TreparationController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $treparations = Treparation::all();
        if ($request->has('search')) {
            $treparations = Treparation::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('treparations.index', compact('treparations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('treparations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
  
        $input = $request->all();
    
        Treparation::create($input);
     
        return redirect()->route('treparations.index')
                        ->with('success','type carburant créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treparation  $treparation
     * @return \Illuminate\Http\Response
     */
    public function show(Treparation $treparation)
    {
        //
        return view('treparations.show',compact('treparation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treparation  $treparation
     * @return \Illuminate\Http\Response
     */
    public function edit(Treparation $treparation)
    {
        //
        return view('treparations.edit',compact('treparation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treparation  $treparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treparation $treparation)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);
  
        $input = $request->all();
          
        $treparation->update($input);
    
        return redirect()->route('treparations.index')
                        ->with('success','type reparation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treparation  $treparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        Treparation::where('id',$id)->delete();
      return back();
    }
}
