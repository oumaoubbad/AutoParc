@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                <strong>   Modifier Réservations :</strong></i>
                                </h3>


                             
   
    
    
    <form action="{{ route('reservations.update',$reservation->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
       
        

        <div class="form-row">
    <div class="col-md-6 mb-3">

    

    <div class="form-group">
                              <strong>Date début:</strong>
                            

<input type="date" name="date_debut"
value="{{ $reservation->date_debut }}"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
                              <strong>Fate fin:</strong>
                            

<input type="date" name="date_fin"
value="{{ $reservation->date_fin }}"
       min="2000-01-01" max="2100-12-31">
</div>
                             
</div>


<div class="col-md-6 mb-3">

<div class="form-group">
                              <strong>Région:</strong>
                <input type="text" name="region" value="{{ $reservation->region }}" class="form-control" placeholder="montant_avance">
                              </div>
</div>

    <div class="col-md-6 mb-3">
    <div class="form-group">
                              <strong>Destination:</strong>
                <input type="text" name="direction" value="{{ $reservation->direction }}" class="form-control" placeholder="montant_avance">
                              </div>
</div>
</div>

    <div class="col-md-6 mb-3">

         
    <div class="form-group">
                              <strong>description:</strong>
                              <textarea id="w3review" name="description"  rows="5" cols="100">{{ $reservation->description }}</textarea>




</div>


</div>                        
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('reservations.index') }}"> retour</a>
          
</div>

                              </form>
                            </div>
                            
                   
            </div>
        </div>
    
</div>
@endsection