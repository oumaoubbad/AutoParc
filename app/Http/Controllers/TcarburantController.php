<?php

namespace App\Http\Controllers;

use App\Models\Tcarburant;
use Illuminate\Http\Request;

class TcarburantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tcarburants = Tcarburant::all();
        if ($request->has('search')) {
            $tcarburants = Tcarburant::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('tcarburants.index', compact('tcarburants'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tcarburants.create');
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
    
        Tcarburant::create($input);
     
        return redirect()->route('tcarburants.index')
                        ->with('success','tupe carburant créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tcarburant  $tcarburant
     * @return \Illuminate\Http\Response
     */
    public function show(Tcarburant $tcarburant)
    {
        //
        return view('tcarburants.show',compact('tcarburant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tcarburant  $tcarburant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tcarburant $tcarburant)
    {
        //
        return view('tcarburants.edit',compact('tcarburant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tcarburant  $tcarburant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tcarburant $tcarburant)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);
  
        $input = $request->all();
          
        $tcarburant->update($input);
    
        return redirect()->route('tcarburants.index')
                        ->with('success','type carburant mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tcarburant  $tcarburant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tcarburant $tcarburant)
    {
        //
        $tcarburant->delete();

        return redirect()->route('tcarburants.index')
        ->with('success','tcarburant deleted successfully');
    }
}
