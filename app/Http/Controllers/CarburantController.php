<?php

namespace App\Http\Controllers;


use App\Models\Carburant;
use App\Models\Voiture;
use App\Models\Tcarburant;
use Illuminate\Http\Request;


class CarburantController extends Controller
{
    //
    public function index()
    {
        //
        $carburants = Carburant::latest()->paginate(5);
    
        return view('carburants.index',compact('carburants'))
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
        return View("carburants.create")
        -> with(["voitures"=> Voiture::all()])
        -> with(["tcarburants"=> Tcarburant::all()]);
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
            'date' => 'nullable|date',
            'kilom' => 'required',
            'note' => 'required',
            'prix' => 'required',
            'litre' => 'required',
            'voiture_id' => 'required',
            'tcarburant_id' => 'required',

           
            
        ]);
    
        Carburant::create($request->all());
     
        return redirect()->route('carburants.index')
                        ->with('success','carburant créée avec succès..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carburant  $entretien
     * @return \Illuminate\Http\Response
     */
    public function show(Carburant $carburant)
    {
        //
        return view('carburants.show',compact('carburant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function edit(Carburant $carburant)
    {
        //
       
        $tcarburants = Tcarburant::all();
        $voitures = Voiture::all();
        return view('carburants.edit', compact('carburant', 'tcarburants' ,'voitures'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carburant $carburant)
    {
        //
        $request->validate([
            'date' => 'nullable|date',
            'kilom' => 'required',
            'note' => 'required',
            'prix' => 'required',
            'litre' => 'required',
            'voiture_id' => 'required',
            'tcarburant_id' => 'required',

            
        ]);
  
        $input = $request->all();
          
        $carburant->update($input);
    
        return redirect()->route('carburants.index')
                        ->with('success','carburant mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carburant $carburant)
    {
        //
        $carburant->delete();

        return redirect()->route('carburants.index')->with('message', 'carburant supprimé avec succès');
    }
}
