@extends('layouts.master')     
@section('content')
<div class="container">

  <div class="row  my-5">
  
   
    <div class="col-md-6 mp-3 mx-auto card">
    
    <h3 class="text-dark ">
             <strong>  Modifier traite </strong></i>
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
    <form action="{{ route('traites.update',$traite->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')



                              <div class="form-group">
                              <strong>voiture:</strong>
                              <select name="voiture_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($voitures as $voiture)
                                            <option value="{{ $voiture->id }}"
                                                {{ $voiture->id == $traite->voiture_id ? 'selected' : '' }}>
                                                {{ $voiture->matricule }}</option>
                                        @endforeach
                </select>  
                              </div>
                              <div class="form-group">
                              <strong>date d'achat:</strong>
                            

<input type="date" name="date_achat" 
value="{{ $traite->date_achat }}"
       min="2000-01-01" max="2100-12-31">
</div>
                              
                              <div class="form-group">
                              <strong>jour de traite:</strong>
                <input type="text" name="jour_traite"  value="{{ $traite->jour_traite }}" class="form-control" placeholder="jour_traite">
                              </div>
                              
                              <div class="form-group">
                              <strong>mois resté:</strong>
                <input type="text" name="mois_reste" value="{{ $traite->mois_reste }}" class="form-control" placeholder="mois_reste">
                              </div>
                              
                              <div class="form-group">
                              <strong>montant avancé:</strong>
                <input type="text" value="{{ $traite->montant_avance }}" name="montant_avance" class="form-control" placeholder="montant_avance">
                              </div>
                              
                              <div class="form-group">
                              <strong>prix d'achat:</strong>
                <input type="text" name="prix_achat" value="{{ $traite->prix_achat }}" class="form-control" placeholder="prix_achat">
                              </div>
                              
                              
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('traites.index') }}"> retour</a>
          
                              </div>
                              </form>
    </div>
    

</div>
</div>
@endsection
