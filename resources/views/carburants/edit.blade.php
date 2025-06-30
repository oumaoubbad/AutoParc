@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                  <strong>  Modifier carburant  </strong></i>
                                </h3>


                                @if ($errors->any())
        <div class="alert alert-info">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('carburants.update',$carburant->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        

        <div class="form-row">
    <div class="col-md-6 mb-3">

    <div class="form-group">
                              <strong>date début:</strong>
                            

<input type="date" name="date"
value="{{ $carburant->date }}"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
                              <strong>kilométrage:</strong>
                <input type="text" name="kilom" value="{{ $carburant->kilom }}" class="form-control" placeholder="montant_avance">
                              </div>
</div>

                             
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">

          <div class="form-group">
          <strong>voiture:</strong>
          <select name="voiture_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($voitures as $voiture)
                                            <option value="{{ $voiture->id }}"
                                                {{ $voiture->id == $carburant->voiture_id ? 'selected' : '' }}>
                                                {{ $voiture->matricule }}</option>
                                        @endforeach
                </select>
                                </div>
</div>

<div class="col-md-4 mb-3">
<div class="form-group">
<strong>type carburant:</strong>

<select name="tcarburant_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($tcarburants as $tcarburant)
                                            <option value="{{ $tcarburant->id }}"
                                                {{ $tcarburant->id == $carburant->tcarburant_id ? 'selected' : '' }}>
                                                {{ $tcarburant->name }}</option>
                                        @endforeach
                </select>
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-4 mb-3">
    <div class="form-group">
                              <strong>litre:</strong>
                <input type="text" name="litre" value="{{ $carburant->litre }}" class="form-control" placeholder="montant_avance">
                              </div>
</div>
    <div class="col-md-4 mb-3">
    <div class="form-group">
                              <strong>prix:</strong>
                <input type="text" name="prix" value="{{ $carburant->prix }}" class="form-control" placeholder="montant_avance">
                              </div>
</div>
</div>

    <div class="col-md-6 mb-3">

         
    <div class="form-group">
                              <strong>note:</strong>
                              <textarea id="w3review" name="note" rows="5" cols="100">{{ $carburant->note }}</textarea>

</div>
</div>
</div>



<div class="form-group p-5">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('carburants.index') }}"> Annuler</a>
          
                              </div>

                              </form>
                            
                            
                  
            
        </div>
        </div>
    
</div>
@endsection