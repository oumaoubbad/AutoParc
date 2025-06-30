<?php

namespace App\Http\Controllers;

use App\Models\Traite;

use App\Models\Voiture;
use Illuminate\Http\Request;

class TraiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $traites = Traite::latest()->paginate(5);
    
        return view('traites.index',compact('traites'))
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
        return View("traites.create")
        -> with(["voitures"=> Voiture::all()]);
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
            'mois_reste' => 'required|numeric',
            'jour_traite' => 'required|numeric',
            'date_achat' => 'nullable|date',
            'prix_achat' => 'required|numeric',
            'montant_avance' => 'required|numeric',
            'voiture_id' => 'required|numeric',
           
            
        ]);
    
        Traite::create($request->all());
     
        return redirect()->route('traites.index')
                        ->with('success','modele créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traite  $traite
     * @return \Illuminate\Http\Response
     */
    public function show(Traite $traite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traite  $traite
     * @return \Illuminate\Http\Response
     */
    public function edit(Traite $traite)
    {
        //
        $voitures = Voiture::all();
        return view('traites.edit', compact('traite', 'voitures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traite  $traite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traite $traite)
    {
        //
        $request->validate([
            'mois_reste' => 'required|numeric',
            'jour_traite' => 'required|numeric',
            'date_achat' => 'nullable|date',
            'prix_achat' => 'required|numeric',
            'montant_avance' => 'required|numeric',
            'voiture_id' => 'required|numeric',
            
        ]);
  
        $input = $request->all();
          
        $traite->update($input);
    
        return redirect()->route('traites.index')
                        ->with('success','traite updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traite  $traite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traite $traite)
    {
        //
        $traite->delete();

        return redirect()->route('traites.index')->with('message', 'voiture Deleted Successfully');
  
    }
}
