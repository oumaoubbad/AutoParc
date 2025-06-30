<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

use App\Models\Voiture;
use App\Models\User;
use DateTime;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View("reservation.index")->with(['reservations' => Reservation::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return View("reservation.create")->withVoiture(Voiture::findOrFail($id));


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
        // $this->validate($request, [
        //     "user_id" =>"required",
        //     "voiture_id" =>"required",
        //     "date_debut" =>"image|mimes:png,jpg,jpeg|max:2048",
        //     "date_fin" =>"required|boolean",
        //     "direction" =>"required|numeric",
        //     "region" =>"required|numeric",
        //     "description" =>"required",
        // ]);

        // $dateD = new DateTime($request->date_debut);
        // $dateF = new DateTime($request->date_fin);
        // $jours = date_diff($dateD , $dateF);
        Reservation::create([
            'user_id' => auth()->user()->id,
            'voiture_id'=> $request->voiture_id,    
            'date_debut'=> $request->date_debut,    
            'date_fin'=> $request->date_fin,    
            'direction'=> $request->direction,
            'status'=> $request->status,     
            'region'=> $request->region,    
            'description'=> $request->description,    
            // 'jour'=>$jours,

        ]);
        // $voiture->update([
        //     'status' => 1
        // ]);
     
        return redirect()->route('voitures.index')
                        ->with('success','réservation créée avec succès.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        return view('reservation.show',compact('reservation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
  
        return view('reservation.edit', compact('reservation'));
       
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
        $input = $request->all();
          
        $reservation->update($input);
    
        return redirect()->route('reservations.index')
                        ->with('success','réservation mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function approve(Request $request,$id)
    {

      
        $reservation = Reservation::find($id);

       if($reservation){
           $reservation->status = $request -> approve;
           $reservation->save();
           return redirect()->back();
       }
    }
}
