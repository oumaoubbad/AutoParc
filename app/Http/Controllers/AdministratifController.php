<?php

namespace App\Http\Controllers;
use App\Models\Administratif;
use App\Models\Voiture;


use Illuminate\Http\Request;

class AdministratifController extends Controller
{
    //
    public function index()
    {
        //
        $administratifs = Administratif::latest()->paginate(5);
    
        return view('administratif.index',compact('administratifs'))
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
        return View("administratif.create")
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

            'assurance_debut' => 'nullable|date',
            'assurance_expire_le' => 'nullable|date',
            'voiture_id' => 'required',
            'effectue_le' => 'nullable|date',
            'visite_expire_le' => 'nullable|date',
            'vignet' => 'nullable|date',
            'vignet_expire_le' => 'nullable|date',

           
            
        ]);
    
        Administratif::create($request->all());
     
        return redirect()->route('administratif.index')
                        ->with('success','visite créé avec succès.');
    }

    
    public function show(Administratif $administratif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administratif  $administratif
     * @return \Illuminate\Http\Response
     */
    public function edit(Administratif $administratif)
    {
        //
        $voitures = Voiture::all();
        return view('administratif.edit', compact('administratif', 'voitures'));
    }

   
    public function update(Request $request, Administratif $administratif)
    {
        //
        $request->validate([
            'assurance_debut' => 'nullable|date',
            'assurance_expire_le' => 'nullable|date',
            'voiture_id' => 'required',
            'effectue_le' => 'nullable|date',
            'visite_expire_le' => 'nullable|date',
            'vignet' => 'nullable|date',
            'vignet_expire_le' => 'nullable|date',
        ]);
  
        $input = $request->all();
          
        $administratif->update($input);
    
        return redirect()->route('administratif.index')
                        ->with('success','administratif updated successfully');
    }

  
    public function destroy(Administratif $administratif)
    {
        //
        $administratif->delete();

        return redirect()->route('administratif.index')->with('message', 'administratif supprimé avec succès');
    
    }
}
