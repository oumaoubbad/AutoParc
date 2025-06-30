@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                  <strong>  Modifier réparation  </strong></i>
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
    
    <form action="{{ route('reparations.update',$reparation->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        

        <div class="form-row">
    <div class="col-md-6 mb-3">

    <div class="form-group">
                              <strong>date début:</strong>
                            

<input type="date" name="date_debut"
value="{{ $reparation->date_debut }}"
       min="2000-01-01" max="2100-12-31">
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
                              <strong>date fin:</strong>
                            

<input type="date" name="date_fin"
value="{{ $reparation->date_fin }}"
       min="2000-01-01" max="2100-12-31">
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
                                                {{ $voiture->id == $reparation->voiture_id ? 'selected' : '' }}>
                                                {{ $voiture->matricule }}</option>
                                        @endforeach
                </select>
                                </div>
</div>

<div class="col-md-4 mb-3">
<div class="form-group">
<strong>type réparation:</strong>

<select name="treparation_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($treparations as $treparation)
                                            <option value="{{ $treparation->id }}"
                                                {{ $treparation->id == $reparation->treparation_id ? 'selected' : '' }}>
                                                {{ $treparation->name }}</option>
                                        @endforeach
                </select>
</div>
</div>

    <div class="col-md-4 mb-3">
    <div class="form-group">
                              <strong>prix:</strong>
                <input type="text" name="prix" value="{{ $reparation->prix }}" class="form-control" placeholder="prix">
                              </div>
</div>

    <div class="col-md-6 mb-3">

         
    <div class="form-group">
                              <strong>note:</strong>
                              <textarea id="w3review" name="note" rows="5" cols="100">{{ $reparation->note }}</textarea>

</div>
</div>
</div>



<div class="form-group my-2">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('reparations.index') }}"> Annuler</a>
          
                              </div>

                              </form>
                            </div>
                            
                            </div>
        </div>
    
</div>
@endsection