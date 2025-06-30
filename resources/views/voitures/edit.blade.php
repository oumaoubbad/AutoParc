
@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2 my-5">
                                   <strong> Modifier Voiture </strong></i>
                                </h3>


                              
    
     
    <form action="{{ route('voitures.update',$voiture->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')


        <div class="form-row">
    <div class="col-md-4 mb-3">

                              <div class="form-group">
                              <strong>Matricule:</strong>
                <input type="text" name="matricule" value="{{ $voiture->matricule }}" class="form-control" >
                              </div>
</div>
<div class="col-md-4 mb-3">
<div class="form-group">
                              <strong>Numéro carte grise:</strong>
                <input type="text" name="ncg"  value="{{ $voiture->ncg }}" class="form-control" >
                              </div>
                             
</div>
    <div class="col-md-4 mb-3">

                              <div class="form-group">
                              <strong>Kilométrage:</strong>
                <input type="text" name="kilo" value="{{ $voiture->kilo }}" class="form-control" placeholder="kilo">
                              </div>
</div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">

          <div class="form-group">
          <strong>Marque:</strong>
                                    <select name="marque_id" id="marque_id" class="form-control">
                                    <option selected>Open this select menu</option>
                                        @foreach ($marques as $marque)
                                            <option value="{{ $marque->id }}"
                                                {{ $marque->id == $voiture->marque_id ? 'selected' : '' }}>
                                                {{ $marque->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

</div>
<div class="col-md-4 mb-3">
                                <div class="form-group">
                                <strong>Modèle:</strong>

          <select name="modele_id" class="form-control" aria-label="Default select example">
              
          <option selected>Open this select menu</option>
                                        @foreach ($modeles as $modele)
                                            <option value="{{ $modele->id }}"
                                                {{ $modele->id == $voiture->modele_id ? 'selected' : '' }}>
                                                {{ $modele->name }}</option>
                                        @endforeach
          </select>
</div>
</div>
<div class="col-md-4 mb-3">

         
                              <div class="form-group">
                              <strong>Etat:</strong>
                              <select name="etat" class="form-control">
                                      <option value=""  disabled>en service</option>
                                      <option value="1" {{$voiture->etat ===1 ? "selectes":""}} >en service</option>
                                      <option value="0"  {{$voiture->etat ===1 ? "selectes":""}}>en panne</option>
                                  </select>
</div>
</div>
</div>

<div class="form-row">
<div class="col-md-4 mb-3">
<div class="form-group">
<strong>Type carburant:</strong>

          <select name="tcarburant_id" class="form-control" aria-label="Default select example">
              
          <option selected>Open this select menu</option>
                                        @foreach ($tcarburants as $tcarburant)
                                            <option value="{{ $tcarburant->id }}"
                                                {{ $tcarburant->id == $voiture->tcarburant_id ? 'selected' : '' }}>
                                                {{ $tcarburant->name }}</option>
                                        @endforeach
          </select>
</div>
</div>


    <div class="col-md-4 mb-3">

         
                              <div class="form-group">
                              <strong>Disponibilité:</strong>
                              <select name="status" class="form-control">
                                      <option value=""  disabled>Disponibilité</option>
                                      <option value="1" {{$voiture->status ===1 ? "selectes":""}} >dispo</option>
                                      <option value="0"  {{$voiture->status ===1 ? "selectes":""}}>affecté</option>
                                  </select>
</div>
</div>

<div class="col-md-4  mb-3">
<div class="form-group">
<strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image"> <br/>
                    <img src="/image/{{ $voiture->image }}" width="300px">

</div>
</div>
</div>




          
                            
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('voitures.index') }}"> retour</a>
          
</div>

                              </form>
                            </div>
                            
                    </div>
                             
                    </div>
                    
                </div>
           

@endsection