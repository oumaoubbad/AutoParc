<?php

namespace App\Http\Controllers;

use App\Models\Entretien;
use App\Models\Voiture;
use App\Models\Tentretien;
use Illuminate\Http\Request;

class EntretienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entretiens = Entretien::latest()->paginate(5);
    
        return view('entretiens.index',compact('entretiens'))
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
        return View("entretiens.create")
        -> with(["voitures"=> Voiture::all()])
        -> with(["tentretiens"=> Tentretien::all()]);
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
            'tentretien_id' => 'required',

           
            
        ]);
    
        Entretien::create($request->all());
     
        return redirect()->route('entretiens.index')
                        ->with('success','entretien créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function show(Entretien $entretien)
    {
        //
        return view('entretiens.show',compact('entretien'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function edit(Entretien $entretien)
    {
        //
       
        $tentretiens = Tentretien::all();
        $voitures = Voiture::all();
        return view('entretiens.edit', compact('entretien', 'tentretiens' ,'voitures'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entretien $entretien)
    {
        //
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'note' => 'required',
            'prix' => 'required',
            'voiture_id' => 'required',
            'tentretien_id' => 'required',

            
        ]);
  
        $input = $request->all();
          
        $entretien->update($input);
    
        return redirect()->route('entretiens.index')
                        ->with('success','entretien mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entretien $entretien)
    {
        //
        $entretien->delete();

        return redirect()->route('entretiens.index')->with('message', 'voiture Deleted Successfully');
    }
}
