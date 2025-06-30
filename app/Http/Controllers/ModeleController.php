<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index()
    {
        //
        $modeles = Modele::latest()->paginate(5);
    
        return view('modeles.index',compact('modeles'))
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
        $marques = Marque::all();

        return view('modeles.create', compact('marques'));
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
            'marque_id' => 'required',
            
        ]);
    
        Modele::create($request->all());
     
        return redirect()->route('modeles.index')
                        ->with('success','modele créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        //
        $marques = Marque::all();
        return view('modeles.edit', compact('modele', 'marques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele $modele)
    {
        //
        $modele->update([
            'marque_id' => $request->marque_id,
            'name'     => $request->name
        ]);
        return redirect()->route('modeles.index')->with('message', 'modele mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
        //
        $modele->delete();

        return redirect()->route('modeles.index')->with('message', 'modele Deleted Successfully');
    }
}
