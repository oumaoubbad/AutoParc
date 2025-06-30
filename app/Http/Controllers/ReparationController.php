<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Voiture;
use App\Models\Treparation;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reparations = Reparation::latest()->paginate(5);
    
        return view('reparations.index',compact('reparations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View("reparations.create")
        -> with(["voitures"=> Voiture::all()])
        -> with(["treparations"=> Treparation::all()]);
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
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'note' => 'required',
            'prix' => 'required',
            'voiture_id' => 'required',
            'treparation_id' => 'required',

           
            
        ]);
    
        Reparation::create($request->all());
     
        return redirect()->route('reparations.index')
                        ->with('success','reparation créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eeparation  $eeparation
     * @return \Illuminate\Http\Response
     */
    public function show(Reparation $reparation)
    {
        //
        return view('reparations.show',compact('reparation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eeparation  $eeparation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparation $reparation)
    {
        //
       
        $treparations = Treparation::all();
        $voitures = Voiture::all();
        return view('reparations.edit', compact('reparation', 'treparations' ,'voitures'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eeparation  $eeparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparation $reparation)
    {
        //
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'note' => 'required',
            'prix' => 'required',
            'voiture_id' => 'required',
            'treparation_id' => 'required',

            
        ]);
  
        $input = $request->all();
          
        $reparation->update($input);
    
        return redirect()->route('reparations.index')
                        ->with('success','reparation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eeparation  $eeparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparation $reparation)
    {
        //
        $reparation->delete();

        return redirect()->route('reparations.index')->with('message', 'voiture Deleted Successfully');
    }
}
