@extends('layouts.master')     
@section('content')

    <div class="row my-5 ">
        <div class="col-md-10 mx-auto">
            <div class="card border-info my-3">
                        <div class="col-md-10 mx-auto">
                                <h3 class="text-dark mb-3 p-2">
                                    Modifier Employe</i>
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
    
    <form action="{{ route('employes.update',$employe->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
        

        <div class="form-row">
    <div class="col-md-4 mb-3">

                              <div class="form-group">
                              <strong>Nom:</strong>
                <input type="text"  value="{{ $employe->nom }}" name="nom" class="form-control" placeholder="nom">
                              </div>
</div>
<div class="col-md-4 mb-3">
<div class="form-group">
                              <strong>prénom:</strong>
                <input type="text"  value="{{ $employe->prenom }}" name="prenom" class="form-control" placeholder="prénom">
                              </div>
                             
</div>
<div class="col-md-4 mb-3">
<div class="form-group">
<strong>Fonction:</strong>

<select name="fonction_id" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($fonctions as $fonction)
                                            <option value="{{ $fonction->id }}"
                                                {{ $fonction->id == $employe->fonction_id ? 'selected' : '' }}>
                                                {{ $fonction->fonc }}</option>
                                        @endforeach
                </select>
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12 mb-3">
                                <div class="form-group">
                                <strong>adresse:</strong>
                <input type="text"  value="{{ $employe->adr }}" name="adr" class="form-control" placeholder="adresse">
                              </div>
                  
           
</div>
</div>
<div class="form-row">
<div class="col-md-6 mb-3">
                                <div class="form-group">
                                <strong>email:</strong>
                <input type="text"  value="{{ $employe->email }}" name="email" class="form-control" placeholder="adresse">
                              </div>
                  
           
</div>

<div class="col-md-6 mb-3">
<div class="form-group">
<strong>CIN:</strong>
                <input type="text"  value="{{ $employe->CIN }}" name="CIN" class="form-control" placeholder="CIN">
                              </div>
</div>
<div class="col-md-4  mb-3">
<div class="form-group">
<strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image"> <br/>
                    <img src="/image/{{ $employe->image }}" width="300px">

</div>
</div>
<div class="col-md-4 mb-3">
<div class="form-group">
<strong>Tel:</strong>
                <input type="text"   value="{{ $employe->tel }}" name="tel" class="form-control" placeholder="tel">
</div>
</div>
<div class="col-md-4 mb-3">

         
<div class="form-group">
<strong>Numéro de permis:</strong>
<input type="text" name="num_permis"  value="{{ $employe->num_permis }}" class="form-control" placeholder="prénom">
</div>
</div>
</div>




          
                              
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('employes.index') }}"> Annuler</a>
          
</div>

                              </form>
                            </div>
                            
                    </div>
                </div>
           
</div>
@endsection