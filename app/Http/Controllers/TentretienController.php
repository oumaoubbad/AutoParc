<?php

namespace App\Http\Controllers;

use App\Models\Tentretien;
use Illuminate\Http\Request;

class TentretienController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tentretiens = Tentretien::all();
        if ($request->has('search')) {
            $tentretiens = Tentretien::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('tentretiens.index', compact('tentretiens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tentretiens.create');

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
    
        Tentretien::create($input);
     
        return redirect()->route('tentretiens.index')
                        ->with('success','type carburant créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tentretien  $tentretien
     * @return \Illuminate\Http\Response
     */
    public function show(Tentretien $tentretien)
    {
        //
        return view('tentretiens.show',compact('tentretien'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tentretien  $tentretien
     * @return \Illuminate\Http\Response
     */
    public function edit(Tentretien $tentretien)
    {
        //
        return view('tentretiens.edit',compact('tentretien'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tentretien  $tentretien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tentretien $tentretien)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);
  
        $input = $request->all();
          
        $tentretien->update($input);
    
        return redirect()->route('tentretiens.index')
                        ->with('success','type entretien mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tentretien  $tentretien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        Tentretien::where('id',$id)->delete();
      return back();
    }
}
