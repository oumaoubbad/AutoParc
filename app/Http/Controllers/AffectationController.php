<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affectation;

use App\Models\Reservation;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View("affectation.index")->with(['affectations' => Affectation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return View("affectation.create")->withReservation(Reservation::findOrFail($id));

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Affectation::create([
            
            'reservation_id'=> $request->reservation_id,    
    

        ]);
      
     
        return redirect()->route('affectations.index')
                        ->with('success','affectation mise à jour avec succès');

    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Affectation $affectation)
    {
        //
        return view('affectation.show',compact('affectation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affectation $affectation)
    {
        $affectation->delete();
        return redirect()->route('affectations.index')->with('message', 'affectation supprimé avec succès');
    }
}
